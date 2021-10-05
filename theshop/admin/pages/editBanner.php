<title>Edit data</title>
</head>

<body>
    <div class="container-fluid">
        <!-- breadcrumbs -->
        <ol class="breadcrumb">
            <li><a href="#!"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#!"><i class="fa fa-flag"></i> Merek</a></li>
            <li><a href="#!"><i class="fa fa-pencil"></i> <strong>Edit</strong></a></li>
        </ol>

        <h1 class="title">Edit Data (Banner)</h1><br><br>

        <form action="" method="post" class="formEdit">
            <div class="input-group">
                <label for="">id</label>
                <input type="text" name="txtNama" class="form-control" disabled value="1">
            </div>
            <div class="input-group">
                <label for="">Judul Banner</label>
                <input type="text" name="txtNama" class="form-control">
            </div>
            <div class="input-group">
                <label for="">Deskripsi</label>
                <input type="text" name="txtNama" class="form-control">
            </div>
            <div class="input-group">
                <label for="">Gambar</label>
                <input type="file" name="file_gambar">
            </div>
            <button type="submit" name="btnEdit" class="btn primary"><i class="fa fa-refresh"></i> Update</button>
            <a href="#!" class="btn danger"><i class="fa fa-times"></i> Cancel</a>
        </form>

        <br><br>
    </div>