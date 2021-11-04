<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
    include '../config/config.php';
    $tinnhan_from = '1';
    $tinnhan_to = $_POST['tinnhan_to'];
    $noidung = $_POST['noidung'];


    $sql = "INSERT INTO tb_tinnhan (tinnhan_from, tinnhan_to, noidung)
            VALUES ('$tinnhan_from', '$tinnhan_to','$noidung')";
    $result = mysqli_query($conn,$sql);
    
?>