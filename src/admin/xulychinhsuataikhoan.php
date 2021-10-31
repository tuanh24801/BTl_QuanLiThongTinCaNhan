<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
?>

<?php

    $id_taikhoan = $_POST['id_taikhoan'];
    $tentaikhoan = $_POST['tentaikhoan'];
    $tennguoidung = $_POST['tennguoidung'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $trangthai = $_POST['trangthai'];
    include '../config/config.php';
    $sql_kiemtra = "SELECT * FROM tb_taikhoan WHERE id_taikhoan != '$id_taikhoan' ";
    $result_kiemtra = mysqli_query($conn,$sql_kiemtra);
    if(mysqli_num_rows($result_kiemtra) > 0){
        while($row = mysqli_fetch_assoc($result_kiemtra)){
            if($tentaikhoan == $row['tentaikhoan']){
                echo 'Tên tài khoản đã tổn tại';
                exit();
            }
            if($email == $row['email']){
                echo 'email đã tồn tại';
                exit();
            }
        }
    }
    if($tentaikhoan == ''){
        echo('tên tài khoản không được để trống');
        exit();
    }
    if($tennguoidung == ''){
        echo('tên người dùng không được để trống');
        exit();
    }
    if($email == ''){
        echo('email không được để trống');
        exit();
    }
  

    $sql = "UPDATE tb_taikhoan 
        SET tentaikhoan = '$tentaikhoan', tennguoidung = '$tennguoidung', email = '$email', trangthai = '$trangthai'
        WHERE id_taikhoan = '$id_taikhoan'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo('Chỉnh sửa thành công');
        $sql = "UPDATE tb_nguoidung 
        SET tennguoidung = '$tennguoidung'
        WHERE id_nguoidung = '$id_taikhoan'";
        $result = mysqli_query($conn,$sql);
    }else{
        echo('Chỉnh sửa khôngthành công');
    }
?>