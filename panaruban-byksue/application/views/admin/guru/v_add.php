<div class="col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Data Guru
    </div>
    <div class="panel-body">
<?php
    
    if (isset($error_upload)) {
        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
    }

    echo form_open_multipart('guru/add');
?>
            <div class="form-group">
                <label>NIP</label>
                <input class="form-control" type="text" name="nip" placeholder="NIP" required>
            </div>

            <div class="form-group">
                <label>Nama Guru</label>
                <input class="form-control" type="text" name="nama_guru" placeholder="Nama Guru"required>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input class="form-control" type="text" name="tempat_lahir" placeholder="Tempat Lahir"required>
            </div>
        </div>

            <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input class="form-control" type="date" name="tgl_lahir" placeholder="Tanggal lahir"required>
            </div>
        </div>

            <div class="form-group">
                <label>Mata Pelajaran</label>
                <select name="id_mapel" class="form-control">
                    <option value="">- Pilih Mata Pelajaran -</option>
                <?php foreach ($mapel as $key => $value) { ?>
                    <option value="<?= $value->id_mapel ?>"><?= $value->nama_mapel ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Pendidikan</label>
                <select name="pendidikan" class="form-control">
                    <option value="">- Pilih Pendidikan -</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>

             <div class="form-group">
                <label>Foto Guru</label>
                <input type="file" class="form-control"  type="text" name="foto_guru" required>
            </div>

             <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>

<?php echo form_close(); ?>
       
</div>
</div>