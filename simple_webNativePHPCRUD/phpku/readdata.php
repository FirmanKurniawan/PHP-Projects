<?php
  include '../db.php';
  $sql = "select * from score";
  $result = $conn->query($sql);
  if(empty($_GET["id"])){
    $idku = 0;
  }else{
  $idku = $_GET["id"];
  }
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    if ($row['id'] == $idku) { 
      echo '<form class="form-inline m-2" action="update.php" method="POST">';
      echo '<td><input type="text" class="form-control" name="name" value="'.$row['name'].'"></td>';
      echo '<td><input type="number" class="form-control" name="score" value="'.$row['score'].'"></td>';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<input type="hidden" name="id" value="'.$row['id'].'">';
      echo '</form>';
    } else {
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['score'] . "</td>";
      echo '<td><a class="btn btn-primary" href="index.php?id=' . $row['id'] . '" role="button">Update</a></td>';
    }
    echo '<td><a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '" role="button">Delete</a></td>';
    echo "</tr>";
  }


  $conn->close();
?>