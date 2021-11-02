<?php
    session_start();
    if(isset($_SESSION['admin_login'])){
        header("location: ./dstaikhoan.php");
    }else{
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
?>