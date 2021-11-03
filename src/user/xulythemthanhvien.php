<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
    include '../config/config.php';
    $id_thanhvien = $_POST['id_nguoidung'];
    $id_nhom = $_SESSION['id_nhom_moi'];
    $tennhom = $_SESSION['tennhom_moi'];
    $sql_taonhom = "INSERT INTO tb_nhom(tennhom,id_nhom,id_thanhvien)
                    VALUES('$tennhom','$id_nhom','$id_thanhvien')";
    $result_taonhom = mysqli_query($conn,$sql_taonhom);

        
    
?>