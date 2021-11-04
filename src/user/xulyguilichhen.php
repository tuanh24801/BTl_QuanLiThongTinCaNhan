<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
    include '../config/config.php';

    $tinnhan_from = $_SESSION['user_login'];
    $tenlich = $_POST['tenlich'];
    $id_nhanlich = $_POST['id_nhanlich'];
    $thoigianlich = $_POST['thoigianlich'];
    $noidunglich = $_POST['noidunglich'];
    $noidung = "*Tin nhắn gửi lịch hẹn <br> Tên lịch : ".$tenlich." <br> Nội dung: ".$noidunglich." <br> Thời gian: ".$thoigianlich."";

    $sql = "INSERT INTO tb_tinnhan (tinnhan_from, tinnhan_to, noidung)
            VALUES ('$tinnhan_from', '$id_nhanlich','$noidung')";
    $result = mysqli_query($conn,$sql);
    
?>