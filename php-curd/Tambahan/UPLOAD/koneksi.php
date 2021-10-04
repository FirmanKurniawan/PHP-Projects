<?php

//koneksi ke databse
$db = mysqli_connect("localhost", "root", "", "phpdasar");


// FUNGSI UNTUK MENAMPILKAN ISI DATA DARI DATABASE
function query($query) // function query dan ($query parameter memanggil sql SELECT) sebagai fungsi memanggil di index
{
    global $db; // global untuk mengambil variable di atas
    $result = mysqli_query($db, $query); // menampilkan data SELECT / menirim perintah  sql ke server sql untuk melakukan CURD
    $rows = []; // array kosong untuk tempat
    while ($row = mysqli_fetch_assoc($result)) {  // loop untuk menampilkan semua data dari database
        $rows[] = $row; //
    }

    return $rows; // mengambalikan nilai $rows
}


// FUNGSI UNTUK MENAMBAHKAN DATA
function tambah($post)
{
    global $db; // global berfungsi untuk mengambil $db dari luar func tambah()
    $id = htmlspecialchars($post["id"]); // htmlspecialchars adalah func untuk pengaman jika user mengisi form dengan code script
    $nama = htmlspecialchars($post["nama"]);
    $usia = htmlspecialchars($post["usia"]);
    $merek = htmlspecialchars($post["merek"]);
    $produk = htmlspecialchars($post["produk"]);

    // upload gambar
    $gambar  = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO data_pelanggan VALUES ('$id', '$nama', '$usia', '$merek', '$produk','$gambar')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db); //  untuk mengecek apalah func tambah() berfungsi jika iya maka nilai akan 1 (jika tidak akan -1)
}


// FUNGSI UNTUK MENGUPLOAD FILE GAMBAR
function upload()
{
    $namaFile = $_FILES['gambar']['name']; // data dari array type file
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar di upload
    if ($error === 4) {
        echo "
        <script>alert('Pilih gambar terlebih dahulu!');</script>
        ";
        return false; // berhentikan function (jika function upload gagal, function tambah juga gagal)
    }

    // cek apakah yg di upload adalah gambar
    $ektensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ektensiGambar = explode('.', $namaFile);
    // explode adalah sebuah fungsi  memecah sebuah string menjadi array (memeceh dengan delimiter)
    $ektensiGambar = strtolower(end($ektensiGambar)); // mengambil ekstensi gambar (dari kata terakhir) // strtolower agar ekstensi gambar menjadi huruf kecil
    if (!in_array($ektensiGambar, $ektensiGambarValid)) {
        // mengecek apakah ekstensi yg di upload ada di $ektensiGambarValid
        echo "
        <script>alert('yang kamu upload bukan gambar!');</script>
        ";
        return false;
    }

    // cek jika ukuran gambar terlalu besar
    if ($ukuranFile > 3000000) { // ukuran dalam tipe byte 1jt byte = 1MB
        echo "
        <script>alert('Ukuran Gambar Terlalu Besar!');</script>
        ";
        return false;
    }

    //  jika lolos pengecekan  gambar siap di upload
    // generete nama baru agar nama file di database tidak sama antar client
    $namaFileBaru = uniqid(); // func berfungsi untuk meng generate string berupa angka untuk pengganti nama gambar

    $namaFileBaru .= '.'; // berfungsi untuk menambah . dari func uniqid
    $namaFileBaru .= $ektensiGambar; // berfungsi untuk menambah nama ekstensi dari  $ektensiGambar


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru); // move_uploaded_file() berfungsi untuk memindahkan fle ke img/ // untuk memasukan di database pakai query di func tambah


    return $namaFileBaru; // di return agar $gambar bisa di upload di function gambar(di tempat func tambah())
}


function hapus($id)
{

    global $db;
    mysqli_query($db, "DELETE FROM data_pelanggan WHERE id = $id"); // query hapus data dari database
    return mysqli_affected_rows($db);
}

// FUNGSI UNTUK MENGEDIT DATA
function edit($data)
{
    global $db;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $usia = htmlspecialchars($data["usia"]);
    $merek = htmlspecialchars($data["merek"]);
    $produk = htmlspecialchars($data["produk"]);

    $gambarLama = htmlspecialchars($data["gambarLama"]); // gambarLama dari name from di edit.php


    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] == 4) { // 4 artinya user tidak upload gambar (dilihat di var_dump($_FILES))
        $gambar = $gambarLama;
    } else {
        $gambar = upload();  //jalankan fungsi upload
    }

    // query update di databse mengunakan kolom yg ingin di update
    $query = "UPDATE data_pelanggan SET 
    nama = '$nama', 
    usia = '$usia',
    merek = '$merek',
    produk = '$produk',
    gambar = '$gambar'
    WHERE id = $id;
    ";

    mysqli_query($db, $query); // menampilkan data SELECT / menirim perintah  sql ke server sql untuk melakukan CURD

    return mysqli_affected_rows($db);
}


// FUNGSI UNTUK MENCARI
function cari($keyword)
{
    // query untuk mencari berdasarkan keyword di kolom yg dipilih
    $query = "SELECT * FROM data_pelanggan WHERE  
    nama LIKE '%$keyword%' OR  
    usia LIKE '%$keyword%' OR 
    merek LIKE '%$keyword%' OR 
    produk LIKE '%$keyword%'
    ";
    // or seebagai atau

    return query($query);
    // mengambalikan func query dengan argument $query
}
