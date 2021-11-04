<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
    include '../config/config.php';
    $tinnhan_from = $_POST['tinnhan_from'];
    $tinnhan_to = $_POST['tinnhan_to'];
    $noidung = $_POST['noidung'];


    $sql = "INSERT INTO tb_tinnhan (tinnhan_from, tinnhan_to, noidung)
            VALUES ('$tinnhan_from', '$tinnhan_to','$noidung')";
    $result = mysqli_query($conn,$sql);
    
?>