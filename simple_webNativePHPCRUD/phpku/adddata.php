<?php
    include '../db.php';
    $namee = $_POST["name"];
    $score = $_POST["score"];
    $sql = "INSERT INTO score (name, score) VALUES ('$namee', '$score')";
    $conn->query($sql);
    $conn->close();
    header("location: index.php")
?>