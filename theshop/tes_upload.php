<?php
    if (isset($_POST['btnUpload'])){
        move_uploaded_file($_FILES['file_upload']['tmp_name'],$_FILES['file_upload']['name']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tes upload file</title>
</head>
<body>
    <h1>Tes Ahhhhh.....</h1>

    <form action="" method="post" class="upload" enctype="multipart/form-data">
        <input type="file" name="file_upload">
        <button type="submit" name="btnUpload">Upload</button>
    </form>
</body>
</html>