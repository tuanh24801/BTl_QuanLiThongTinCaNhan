<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
?>
<?php
    include '../partials/header.php';
?>
    trang chủ user
    <a href="../dangxuat.php">dang xuat</a>
<?php
    include '../partials/bottom.php';
?>