<?php
    session_start();
    if(isset($_SESSION['admin_login'])){
        header("location: ./admin/index.php");
        exit();
    }
    elseif(isset($_SESSION['user_login'])){
        header("location: ./user/index.php");
        exit();
    }else{
        header("location: ./dangnhap.php");
        exit();
    }
?>
