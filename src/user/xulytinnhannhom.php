<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
    include '../config/config.php';
    $tinnhan_from = $_SESSION['user_login'];
    $sql_tennguoidung = "SELECT * FROM tb_nguoidung WHERE id_nguoidung  = '$tinnhan_from'";
    $result_tennguoidung = mysqli_query($conn,$sql_tennguoidung);
    $row_ten = mysqli_fetch_assoc($result_tennguoidung);
    $tennguoidung = $row_ten['tennguoidung'];
    $tinnhan_to = $_POST['tinnhan_to'];
    $noidung = $_POST['noidung'];
    $noidung_doc = $tennguoidung.':  '.$noidung;

    $sql = "INSERT INTO tb_tinnhan_nhom (tinnhan_from, tinnhan_to, noidung)
            VALUES ('$tinnhan_from', '$tinnhan_to','$noidung')";
    $result = mysqli_query($conn,$sql);
    $sql_nhom = "SELECT * FROM tb_thanhviennhom WHERE id_nhom = '$tinnhan_to' AND id_thanhvien != '$tinnhan_from'";
    $result_nhom = mysqli_query($conn,$sql_nhom);
    while($row_nhom = mysqli_fetch_assoc($result_nhom)){
        $id_nhom = $row_nhom['id_nhom'];
        $id_thanhvien = $row_nhom['id_thanhvien'];
        $sql_tv = "INSERT INTO tb_tinnhan_nhom (tinnhan_from, tinnhan_to, noidung)
                    VALUES ('$id_nhom','$id_thanhvien','$noidung_doc')";
        echo $sql_tv;
        $result_tv = mysqli_query($conn,$sql_tv);        
    }
    
    
?>