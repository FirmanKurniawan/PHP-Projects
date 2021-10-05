<style>
    .input-group-addon{
        width:100px;
    }
    div.input-group{
        margin-top:5px;
        margin-bottom:5px;
    }
    input[type="text"].form-control{
        width:250px;
    }
    input[type="submit"]{
        margin-top:25px;
    }
    p.err{
        display:none;
    }
</style>

<?php
    if (!isset($_GET['id'])){
        ?>
            <?php
                    header('location: index.php?p=viewData');
            ?>
        <?php
    } else {
        $id = $_GET['id'];

        $hasil = $conn->prepare("SELECT * FROM orang where id='$id'");
        $hasil->execute();
        $data = $hasil->fetchAll();
    
?>

<div class="container-fluid">
    <ol class="breadcrumb">
            <li><a href="#!">root</a></li>
            <li><a href="#!">Update Data</a></li>
    </ol>

    <h1>Update data</h1><br>
    <p id="err">Untuk menyunting data, silakan ke bagian <i>View data</i> untuk memilih salah satu data untuk disunting</p>

    <form action="proses/updatedata.php?id=<?php echo $id; ?>" method="post">
        <table>
            <?php
            foreach ($data as $key){                
            ?>
            <tr>
                <td>
                    <div class="input-group">
                    <span class="input-group-addon" id="name-addon">Nama   : </span>
                    <input type="text" class="form-control" aria-describedby="name-addon" name="txtNama" autocomplete="off" value="<?php echo $key['nama']; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group">
                    <span class="input-group-addon" id="umur-addon">Kelas   : </span>
                    <input type="text" class="form-control" aria-describedby="umur-addon" name="txtKelas" autocomplete="off" value="<?php echo $key['kelas']; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group">
                    <span class="input-group-addon" id="alamat-addon">Alamat : </span>
                    <input type="text" class="form-control" aria-describedby="name-addon" name="txtAlamat" autocomplete="off" value="<?php echo $key['alamat']; ?>">
                    </div>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>
</div>
<?php
}
?>

<script type="text/javascript">
    $('.li-update').addClass('active');
</script>