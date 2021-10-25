<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
?>
<?php
    include '../partials/header.php';
?>
    trang chủ admin
    <a href="../dangxuat.php">dang xuat</a>
<?php
    include '../partials/bottom.php';
?>