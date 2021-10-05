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
</style>
<script>
    $('.li-insert').addClass('active');
</script>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="#!">root</a></li>
        <li><a href="#!">Insert Data</a></li>
    </ol>

    <h1>Insert Data</h1><br>
    <form action="proses/insertdata.php" method="post">
        <table>
            <tr>
                <td>
                    <div class="input-group">
                    <span class="input-group-addon" id="name-addon">Nama   : </span>
                    <input type="text" class="form-control" autocomplete="off" placeholder="insert your name here..." aria-describedby="name-addon" name="txtNama">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group">
                    <span class="input-group-addon" id="umur-addon">Kelas   : </span>
                    <input type="text" class="form-control" autocomplete="off" placeholder="how old are you?" aria-describedby="umur-addon" name="txtKelas">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group">
                    <span class="input-group-addon" id="alamat-addon">Alamat : </span>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Where do you live?" aria-describedby="name-addon" name="txtAlamat">
                    </div>
                </td>
            </tr>
        </table>
        <input type="submit" class="btn btn-primary btn-md" value="Insert Data" name="btnInsert">
    </form>
</div>