<?php
    session_start();
    if(isset($_POST['sbmitdangnhap'])){
        $tentaikhoan = $_POST['tentaikhoan'];
        $matkhau = $_POST['matkhau'];
        include './config/config.php';
        $sql = "SELECT * FROM tb_taikhoan WHERE tentaikhoan ='$tentaikhoan'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                if($row['trangthai'] == '1'){
                    if($row['muc'] == '1' && $row['matkhau'] == $matkhau){
                        $_SESSION['admin_login'] = $tentaikhoan;
                        header('location: ./admin/index.php');
                    }else{
                        $pass_hash = $row['matkhau'];
                        $id_nguoidung = $row['id_taikhoan'];
                        if(password_verify($matkhau,$pass_hash)){
                            $sql_nguoidung = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = '$id_nguoidung'";
                            $result_nguoidung = mysqli_query($conn,$sql_nguoidung);
                            if(mysqli_num_rows($result_nguoidung) > 0){
                                $row = mysqli_fetch_assoc($result_nguoidung);
                                $_SESSION['user_login'] = $row['id_nguoidung'];
                                header('location: ./user/index.php');
                            }
                            // $_SESSION['user_login'] = $tentaikhoan;
                            // header('location: ./user/index.php');
                        }else{
                            header("location: dangnhap.php?error= Đăng nhập thất bại user");
                        }
                    }
                }else{
                    header("location: dangnhap.php?error= Đăng nhập thất bại");
                }
            }
        }else{
            header("location: dangnhap.php?error= Đăng nhập thất bại");
        }
    }   
?>