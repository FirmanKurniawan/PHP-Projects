<div class="col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">
     <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
    </div>
    <div class="panel-body">
<?php

 if ($this->session->flashdata('pesan')){
    echo'<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    echo $this->session->flashdata('pesan');
    echo '</div>';
 }

?>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($mapel as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->nama_mapel ?></td>
                    <td>
                        <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#edit<?= $value->id_mapel ?>"><i class="fa fa-pencil"></i></button>
                        <a href="<?= base_url('mapel/delete/'.$value->id_mapel) ?>" onclick="return confirm('Yakin Data Akan Dihapus?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

</div>
</div>
</div>



<!-- Modal Add -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 <h4 class="modal-title" id="myModalLabel">Tambah Mapel</h4>
    </div>
        <div class="modal-body">
            <?php echo form_open('mapel/add'); ?>
             <div class="form-group">
                <label>Mata Pelajaran</label>
                <input class="form-control" type="text" name="nama_mapel" placeholder="Mata Pelajaran"required>
            </div>
        </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
         <?php echo form_close(); ?>
         </div>
            </div>
             </div>
                               

<!-- Modal Edit -->
 <?php foreach ($mapel as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value->id_mapel ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 <h4 class="modal-title" id="myModalLabel">Edit Mapel</h4>
    </div>
        <div class="modal-body">
            <?php echo form_open('mapel/edit/'.$value->id_mapel); ?>
             <div class="form-group">
                <label>Mata Pelajaran</label>
                <input class="form-control" type="text" name="nama_mapel" value="<?= $value->nama_mapel ?>" placeholder="Mata Pelajaran"required>
            </div>
        </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
         <?php echo form_close(); ?>
         </div>
            </div>
             </div>
<?php } ?>