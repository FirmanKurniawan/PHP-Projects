<div class="col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">
        
    </div>
    <div class="panel-body">
<?php
    
    if (isset($error_upload)) {
        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
    }

    echo validation_errors('<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

    echo form_open_multipart('gallery/add');
?>
                <div class="form-group">
                <label>Nama Gallery</label>
                <input class="form-control" type="text" name="nama_gallery" placeholder="Nama Gallery" required>
            </div>

             <div class="form-group">
                <label>Sampul</label>
                <input type="file" class="form-control" type="text" name="sampul" required>
            </div>
        
             <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>

<?php echo form_close(); ?>
       
</div>
</div>