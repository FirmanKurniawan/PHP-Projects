<div id="label-page">
    <h3>Tampil Data Anggota</h3>
</div>
<div id="content">
    <p id="tombol-tambah-container"><a href="index.php?p=anggota-input" class="tombol">Tambah Data</a></p>
    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</td>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th id="label-opsi">Opsi</th>
        </tr>
        <?php
        $q_tampil_anggota = mysqli_query($koneksi, "SELECT * FROM tbanggota ORDER BY idanggota DESC") or die(mysqli_error($koneksi));
        $nomor = 1;
        while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
        ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $r_tampil_anggota['idanggota']; ?></td>
                <td><?php echo $r_tampil_anggota['nama']; ?></td>
                <td><?php echo $r_tampil_anggota['jeniskelamin']; ?></td>
                <td><?php echo $r_tampil_anggota['alamat']; ?></td>
                <td>
                    <div class="tombol-opsi-container"><a href="cetak/cetak-kartu-identitas-anggota.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>" target="_blank" class="tombol">Cetak Kartu</a></div>
                    <div class="tombol-opsi-container"><a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota']; ?>" class="tombol">Edit</a></div>
                    <div class="tombol-opsi-container"><a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>" class="tombol">Hapus</a></div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
