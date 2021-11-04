<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
    include '../config/config.php';

    $tinnhan_from = $_SESSION['user_login'];
    $id_nhannv = $_POST['id_nhannv'];
    $tennhiemvu = $_POST['tennhiemvu'];
    $noidungnv = $_POST['noidungnv'];
    $noidung = "*Tin nhắn gửi nhiệm vụ <br> Tên lịch : ".$tennhiemvu." <br> Nội dung: ".$noidungnv."";

    $sql = "INSERT INTO tb_tinnhan (tinnhan_from, tinnhan_to, noidung)
            VALUES ('$tinnhan_from', '$id_nhannv','$noidung')";
    $result = mysqli_query($conn,$sql);
    
?>