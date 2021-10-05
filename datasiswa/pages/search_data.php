<?php
    //include 'config/conf.php';
    include 'config/database.php';

    if (!isset($_POST['btnSearch'])){
        header('location: index.php?p=viewData');
    } else {
        $keyword = $_POST['txtSearch'];
    ?>
        <h1>Search result</h1>
        <p><i>keyword : '<?php echo $keyword; ?>'</i></p><br>
    <?php
        $hasil = $conn->prepare("SELECT * FROM orang WHERE nama LIKE '%$keyword%' OR kelas LIKE '%$keyword%' OR alamat LIKE '%$keyword%'");
        $hasil->execute();
        $data = $hasil->fetchAll();
        ?>
            <table class="table table-bordered table-responsive table-hover">
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
            </table><br>
            <a href="index.php?p=viewData" class="btn btn-default">Kembali</a>
        <?php
        
    }
    

?>