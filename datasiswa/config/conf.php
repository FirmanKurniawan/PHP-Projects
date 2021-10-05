<?php

    date_default_timezone_set("Asia/Jakarta");
    $appname = "Data Siswa";

    function get($val){
        return isset($_GET[$val])?htmlspecialchars($_GET[$val]):null;
    }

    function post($val){
        return isset($_POST[$val])?htmlspecialchars($_POST[$val]):null;
    }

    function inc($val){
        global $conn;
        include file_exists($val.'.php')?$val.'.php':null;
    }

    

?>