<style>
    table{
       padding-bottom:50px; 
    }
    .input-group-search{
        float:right;
        margin-top:-45px;
        width:250px;
    }
    .txtSearch{
        
    }
    .btn{
        margin:2px;
    }
</style>
<?php
    $hasil = $conn->prepare("SELECT * FROM orang");
    $hasil->execute();
    $data = $hasil->fetchAll();
?>
<div class="container-fluid">
    <ol class="breadcrumb">
            <li><a href="#!">root</a></li>
            <li><a href="#!">View Data</a></li>
    </ol>

    <h1>View Data</h1>  
    
    <form method="POST" action="index.php?p=searchData" class="input-group input-group-search">
        <input type="text" placeholder="search here..." class="form-control txtSearch" name="txtSearch">
        <span class="input-group-btn"><input type="submit" style="margin-top:0px;" class="btn btn-default" value="Search" name="btnSearch"></input></span>
    </form>

    <br>

    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <td>id</td>
                <td>Nama</td>
                <td>Kelas</td>
                <td>Alamat</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($data as $key){
                    ?>
                        <tr>
                            <td><?php echo $key['id']; ?></td>
                            <td><?php echo $key['nama']; ?></td>
                            <td><?php echo $key['kelas']; ?></td>
                            <td><?php echo $key['alamat']; ?></td>
                            <td>
                                <a href="index.php?p=updateData&id=<?php echo $key['id']; ?>" class="btn btn-default" ><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="proses/deletedata.php?id=<?php echo $key['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $('.li-view').addClass('active');
</script>