<?php

session_start();
require "../../controllers/login.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login/login.php");
    exit;
}

$id_user = $_GET["id_user"];

if( hapusUser($id_user) > 0) {
    header("Location: user.php");
} else {
    header("Location: user.php");
}

?>