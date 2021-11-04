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
                        if($row['tk_khach'] == '1' &&$row['matkhau'] == $matkhau){
                            $sql_nguoidungkhach = "SELECT * FROM tb_taikhoan WHERE id_nguoidung = '$id_nguoidung'";
                            $result_nguoidungkhach = mysqli_query($conn,$sql_nguoidungkhach);
                            if(mysqli_num_rows($result_nguoidungkhach) > 0){
                                $row_1 = mysqli_fetch_assoc($result_nguoidungkhach);
                                $_SESSION['user_login'] = $row_1['id_nguoidung'];
                                header('location: ./user/index.php');
                                exit();
                            }
                        }else{
                            header("location: dangnhap.php?error= Đăng nhập tài khoản khách thất bại user");
                        }
                        if(password_verify($matkhau,$pass_hash)){
                            $sql_nguoidung = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = '$id_nguoidung'";
                            $result_nguoidung = mysqli_query($conn,$sql_nguoidung);
                            if(mysqli_num_rows($result_nguoidung) > 0){
                                $row = mysqli_fetch_assoc($result_nguoidung);
                                $_SESSION['user_login'] = $row['id_nguoidung'];
                                header('location: ./user/index.php');
                            }
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