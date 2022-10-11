<?php
$iduser = $_GET['id'];
$q_tampil_user = mysqli_query($koneksi, "SELECT * FROM tbuser WHERE iduser='$iduser'");
$r_tampil_user = mysqli_fetch_array($q_tampil_user);
?>
<div id="label-page">
    <h3>Edit Data User</h3>
</div>
<div id="content">
    <form action="proses/user-edit-proses.php" method="post">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">ID User</td>
                <td class="isian-formulir"><input type="text" name="id_user" value="<?php echo $r_tampil_user['iduser']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama Lengkap</td>
                <td class="isian-formulir"><input type="text" name="nama" value="<?php echo $r_tampil_user['nama']; ?>" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir">Alamat</td>
                <td class="isian-formulir"><textarea rows="2" cols="40" name="alamat" class="isian-formulir isian-formulir-border"><?php echo $r_tampil_user['alamat']; ?></textarea></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>
