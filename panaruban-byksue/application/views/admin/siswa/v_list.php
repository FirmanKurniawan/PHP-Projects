<div class="col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">
        <a href="<?= base_url('siswa/add'); ?>" class="btn btn-primary btn-sm" ><i class="fa fa-plus"></i> Add</a>
    </div>
    <div class="panel-body">
<?php
if ($this->session->flashdata('pesan')){
echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
echo $this->session->flashdata('pesan');
echo '</div>';                     
}
?>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead> 
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Kelas</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($siswa as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->nis ?></td>
                    <td><?= $value->nama_siswa ?></td>
                    <td><?= $value->tempat_lahir ?></td>
                    <td><?= $value->tgl_lahir ?></td>
                    <td><?= $value->kelas ?></td>
                    <td><img src="<?= base_url('foto_siswa/'.$value->foto_siswa) ?>" width="80px"></td>
                    <td>
                        <a href="<?= base_url('siswa/edit/'.$value->id_siswa)?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                        <a href="<?= base_url('siswa/delete/'.$value->id_siswa)?>" onclick="return confirm('Apakah data ingin di hapus?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table> 
</div>
</div>
