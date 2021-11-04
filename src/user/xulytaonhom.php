<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
    include '../config/config.php';

    $id_thanhvien = $_SESSION['user_login'];
    $tennhom = $_POST['tennhom'];

    $sql_taonhom = "INSERT INTO tb_nhom(tennhom)
                    VALUES('$tennhom')";
    $result_taonhom = mysqli_query($conn,$sql_taonhom);
    $sql_layidnhom = "SELECT * FROM tb_nhom ORDER BY id_nhom DESC";
    $result_layid_nhom = mysqli_query($conn,$sql_layidnhom);
    $row_layid_nhom = mysqli_fetch_assoc($result_layid_nhom);
    $id_nhom = $row_layid_nhom['id_nhom'];
    $_SESSION['id_nhom_moi'] = $id_nhom;
    $sql_themtv = "INSERT INTO tb_thanhviennhom(id_nhom,id_thanhvien)
                    VALUES ('$id_nhom' ,'$id_thanhvien')";
    $result_themtv = mysqli_query($conn,$sql_themtv);
        
    
?>