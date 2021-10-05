<?php
    include 'admin/conf/db.php';
    class MainPage extends Database{
        public function UniversalDapet($tabel, $id=''){
            if ($id == ''){
                $stmt = $this->conn->prepare("SELECT * FROM ".$tabel."");
                $stmt->execute();
                return $stmt->fetchAll();
            } else{
                $stmt = $this->conn->prepare("SELECT * FROM ".$tabel." WHERE id=".$id."");
                $stmt->execute();
                return $stmt->fetchAll();
            }
        }

        public function UniversalCount($tabel, $type = ''){
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM ".$tabel."");
            $stmt->execute();

            if ($type == ''){
                return $stmt->fetchColumn();
            } else if ($type==1){
                return $stmt->fetchAll();
            }
        }

        public function CariBarang($keyword){
            $stmt = $this->conn->prepare("SELECT * FROM barang WHERE nama_barang LIKE '%".$keyword."%'");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function DetailBarang($kategori_id,$product_id){
            $stmt = $this->conn->prepare("SELECT nama_barang, (SELECT nama FROM kategori WHERE kategori_id=:kategori_id) AS nama_kategori,harga,gambar FROM barang WHERE barang_id=:product_id");
            $stmt->bindValue(":kategori_id",$kategori_id);
            $stmt->bindValue(":product_id", $product_id);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // buat keranjang
        public function insertKeranjang($usr_id, $brg_id, $jml){
            $stmt = $this->conn->prepare("INSERT INTO keranjang (user_id,barang_id,jumlah) VALUES (:usr_id,:brg_id,:jml)");
            $stmt->bindValue(":usr_id", $usr_id);
            $stmt->bindValue(":brg_id", $brg_id);
            $stmt->bindValue(":jml", $jml);
            $stmt->execute();
        }

        public function dapetKeranjang(){
            $stmt = $this->conn->prepare("SELECT * FROM keranjang");
            $stmt->execute();
            $stmt_end = null;
            $hasil = array();

            foreach ($stmt->fetchAll() as $row){
                $stmt_end = $this->conn->prepare("SELECT (SELECT nama_barang FROM barang WHERE barang_id=:barang_id) AS barang_id, (SELECT fullname FROM users WHERE users_id=:users_id) as users_id, jumlah FROM keranjang");
                $stmt_end->bindValue(":barang_id", $row['barang_id']);
                $stmt_end->bindValue(":users_id", $row['users_id']);
                $stmt_end->execute();
                $hasil += $stmt_end->fetchAll();
            }
            return $hasil;
        }
    }
?>