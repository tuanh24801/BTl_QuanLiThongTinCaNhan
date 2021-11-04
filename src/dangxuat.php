<?php
    session_start();
    if(isset($_SESSION['admin_login'])){
        unset($_SESSION['admin_login']);
        header("location: dangnhap.php");
    }elseif(isset($_SESSION['user_login'])){
        unset($_SESSION['user_login']);
        header("location: dangnhap.php");
    }
?>