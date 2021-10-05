<?php
    include '../classes/MainPage.php';
    try{
        $main_page = new MainPage;
        $main_page->insertKeranjang($_GET['usr_id'],$_GET['brg_id'],$_GET['jml']);
        header('location: ../index.php?page=transaction');
        
    } catch (Exception $e){

    }
?>