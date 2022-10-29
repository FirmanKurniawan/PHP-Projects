<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <br>
  <h1>Ujian Akhir Menajemen System</h1>
  <p>You can Create, read, update, and delete records below</p>

  <h5> Insert Data </h5>
  <form class="form-inline m-2" action="adddata.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" class="form-control m-2" id="name" name="name">
    <label for="score">Score:</label>
    <input type="number" class="form-control m-2" id="score" name="score">
    <button type="submit" class="btn btn-primary">Add</button>
  </form>

  <br><h5> Table Data </h5>
  <br>
  <h1>Tes 1</h1>
  <table class="table">
    <tbody>
      <?php include 'readdata.php';?>
    </tbody>
  </table>
</div>
</body>
</html>
