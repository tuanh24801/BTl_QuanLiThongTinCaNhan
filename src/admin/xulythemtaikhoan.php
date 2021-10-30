<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
?>
<?php
    $tentaikhoan = $_POST['tentaikhoan'];
    $tennguoidung = $_POST['tennguoidung'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $trangthai = $_POST['trangthai'];
    if($tentaikhoan == ''){
        echo('vui lòng nhập tên tài khoản');
        exit();
    }
    include '../config/config.php';
    $sql = "SELECT * FROM tb_taikhoan";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($_POST['tentaikhoan'] == $row['tentaikhoan']){
                echo 'Tên tài khoản đã tổn tại';
                exit();
            }
            if($_POST['email'] == $row['email']){
                echo 'email đã tồn tại';
                exit();
            }
        }
    }
    $sql_themtaikhoan = "INSERT INTO tb_taikhoan(tentaikhoan, tennguoidung, email, matkhau, trangthai, tk_khach) 
        VALUES('$tentaikhoan', '$tennguoidung', '$email', '$matkhau', '$trangthai','1')";
    $result_themtaikhoan = mysqli_query($conn,$sql_themtaikhoan);
    if($result_themtaikhoan){
        echo 'Thêm tài khoản khách thành công';
        $sql_taikhoan = "SELECT * FROM tb_taikhoan WHERE tentaikhoan = '$tentaikhoan'";
        $result_taikhoan = mysqli_query($conn,$sql_taikhoan);
        if(mysqli_num_rows($result_taikhoan) >0){
            while($row = mysqli_fetch_assoc($result_taikhoan)){
                $id_taikhoan = $row['id_taikhoan'];
            }
        }
            $sql_themnguoidung = "INSERT INTO tb_nguoidung(id_nguoidung, tennguoidung, email, id_taikhoan) 
                                    VALUES('$id_taikhoan', '$tennguoidung', '$email', '$id_taikhoan')";
            $result_themnguoidung = mysqli_query($conn,$sql_themnguoidung);
            if($result_themnguoidung){
            }else{
                echo 'Thêm tài khoản khách thành công';
                exit();
            }
    }else{
        echo 'Thêm thất bại';

    }
?>