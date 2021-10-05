<?php
    session_start();
    include 'pages/head.php';

    if (isset($_GET['page'])){
        switch ($_GET['page']){
            case 'home':
                include 'pages/home.php';
                break;
            case 'search':
                include 'pages/search.php';
                break;
            case 'details':
                include 'pages/details.php';
                break;
            case 'transaction':
                include 'pages/transaction.php';
                break;
            case 'account_settings':
                include 'pages/accountSettings.php';
                break;
            default:
                include 'pages/home.php';
                break;
        }
    } else {
        include 'pages/home.php';
    }

    include 'pages/foot.php';
?>