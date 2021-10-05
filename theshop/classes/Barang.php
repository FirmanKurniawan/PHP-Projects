<?php
    include '../conf/db.php';

    class Barang extends Database{
        // Fungsi universal
        public function HapusRecord($tabel,$id){
            $SQL = "DELETE FROM ".$tabel." WHERE ".$tabel."_id=:id";
            $stmt = $this->conn->prepare($SQL);
            $stmt->bindValue(":id",$id);
            $stmt->execute();
        }
        // untuk kategori
        public function TambahKategori($kategori){
            $stmt = $this->conn->prepare("INSERT INTO kategori (nama) VALUES (:kategori)");
            $stmt->bindValue(":kategori",$kategori);
            $stmt->execute();
        }

        public function DapetKategori($id=''){
            $stmt = '';
            if ($id == ''){
                $stmt = $this->conn->prepare("SELECT * FROM kategori");
            } else if ($id!='' && $id>0){
                $stmt = $this->conn->prepare("SELECT * FROM kategori WHERE kategori_id=:id");
                $stmt->bindValue(":id",$id);
            }
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // untuk warna
        public function TambahWarna($warna){
            $stmt = $this->conn->prepare("INSERT INTO warna (nama) VALUES (:warna)");
            $stmt->bindValue(":warna",$warna);
            $stmt->execute();
        }

        public function DapetWarna($id=''){
            $stmt = '';
            if ($id == ''){
                $stmt = $this->conn->prepare("SELECT * FROM warna");
            } else if ($id!='' && $id>0){
                $stmt = $this->conn->prepare("SELECT * FROM warna WHERE warna_id=:id");
                $stmt->bindValue(":id",$id);
            }
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // untuk bank
        public function TambahBank($bank){
            $stmt = $this->conn->prepare("INSERT INTO bank (nama) VALUES (:bank)");
            $stmt->bindValue(":bank",$bank);
            $stmt->execute();
        }

        public function DapetBank($id=''){
            $stmt = '';
            if ($id == ''){
                $stmt = $this->conn->prepare("SELECT * FROM bank");
            } else if ($id!='' && $id>0){
                $stmt = $this->conn->prepare("SELECT * FROM bank WHERE bank_id=:id");
                $stmt->bindValue(":id",$id);
            }
            $stmt->execute();
            return $stmt->fetchAll();
        }

         // untuk merek
         public function TambahMerek($merek){
            $stmt = $this->conn->prepare("INSERT INTO merek (nama) VALUES (:merek)");
            $stmt->bindValue(":merek",$merek);
            $stmt->execute();
        }

        public function DapetMerek($id=''){
            $stmt = '';
            if ($id == ''){
                $stmt = $this->conn->prepare("SELECT * FROM merek");
            } else if ($id!='' && $id>0){
                $stmt = $this->conn->prepare("SELECT * FROM merek WHERE merek_id=:id");
                $stmt->bindValue(":id",$id);
            }
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // untuk banner
        public function TambahBanner($judul,$deskripsi,$gambar,$gambar_name){
            $stmt = $this->conn->prepare("INSERT INTO banner (judul,deskripsi,gambar) VALUES (:judul,:deskripsi,:gambar)");
            $stmt->bindValue(":judul",$judul);
            $stmt->bindValue(":deskripsi",$deskripsi);
            $stmt->bindValue(":gambar",$gambar_name);
            $stmt->execute();
            move_uploaded_file($gambar,"../assets/imgs/upload/".$gambar_name);
        }

        public function DapetBanner(){
            $stmt = $this->conn->prepare("SELECT * FROM banner");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // untuk merek
        public function TambahBarang($nama,$kategori,$merek,$warna,$harga,$stok,$nama_foto){
            $stmt = $this->conn->prepare("INSERT INTO barang (nama_barang,kategori_id,merek_id,warna_id,harga,stok,gambar) VALUES (:nama,:kategori,:merek,:warna,:harga,:stok,:nama_foto);");
            $stmt->bindValue(":nama",$nama);
            $stmt->bindValue(":kategori",$kategori);
            $stmt->bindValue(":merek",$merek);
            $stmt->bindValue(":warna",$warna);
            $stmt->bindValue(":harga",$harga);
            $stmt->bindValue(":stok",$stok);
            $stmt->bindValue(":nama_foto",$nama_foto);
            $stmt->execute();
        }

        public function DapetBarang(){
            $stmt = $this->conn->prepare("SELECT * FROM barang");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // fungsi untuk edit 
        public function EditBarang($id, $nama,$kategori,$merek,$warna,$harga,$stok,$gambar,$gambar_nama){
            $stmt = $this->conn->prepare("UPDATE barang set nama=:nama, kategori=:kategori, merek=:merek, warna=:warna, harga=:harga, stok=:stok, gambar=:gambar_nama WHERE barang_id=:id");
            $stmt->bindValue(":id",$id);
            $stmt->bindValue(":nama",$nama);
            $stmt->bindValue(":kategori",$kategori);
            $stmt->bindValue(":merek",$merek);
            $stmt->bindValue(":warna",$warna);
            $stmt->bindValue(":harga",$harga);
            $stmt->bindValue(":stok",$stok);
            $stmt->bindValue(":gambar_nama",$gambar_nama);
            $stmt->execute();
            move_uploaded_file($gambar,"../assets/imgs/upload/".$gambar_nama);
        }

        public function EditBanner($id,$judul,$deskripsi,$gambar,$gambar_nama){
            $stmt = $this->conn->prepare("UPDATE banner SET judul=:judul, deskripsi=:deskripsi, gambar=:gambar_nama WHERE id=:id");
            $stmt->bindValue(":id",$id);
            $stmt->bindValue(":judul",$judul);
            $stmt->bindValue(":deskripsi",$deskripsi);
            $stmt->bindValue(":gambar_nama",$gambar_nama);
            $stmt->execute();
            move_uploaded_file($gambar,"../assets/imgs/upload/".$gambar_nama);
        }

        // hanya untuk satu param sadja
        public function EditKategori($id, $nama){
            $stmt = $this->conn->prepare("UPDATE kategori SET nama='$nama' WHERE kategori_id='$id'");
            $stmt->execute();
        }

        
    }
?>