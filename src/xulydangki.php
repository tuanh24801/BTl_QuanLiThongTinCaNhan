<?php
    if(isset($_POST['btn_dangki'])){
        $tentaikhoan = $_POST['tentaikhoan'];
        $email = $_POST['email'];
        $tennguoidung = $_POST['tennguoidung']; // thêm tên người dùng
        $matkhau = $_POST['matkhau'];
        $matkhau_2 = $_POST['matkhau_2'];
        $checkbox_login = $_POST['checkbox_login'];
        include './sendEmail/sendemail.php';
        include './config/config.php';
        $sql = "SELECT * FROM tb_taikhoan WHERE tentaikhoan = '$tentaikhoan'";
            $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            header('Location: dangki.php?error=Tên tài khoản đã tồn tại');
            exit();
        }
        if($checkbox_login != '1'){
            header('Location: dangki.php?error=vui lòng đồng ý điều khoản sử dụng');
            exit();
        }
        if($matkhau_2 != $matkhau){
            header('Location: dangki.php?error=sai mật khẩu xác nhận');
            exit();
        }else{
            $sql_1 = "SELECT * FROM tb_taikhoan WHERE email = '$email'";
            $result_1 = mysqli_query($conn,$sql_1);
            if(mysqli_num_rows($result_1) > 0){
                header('Location: dangki.php?error=Gmail đã tồn tại');
                exit();
            }else{
                $sql_tk = "SELECT * FROM tb_taikhoan ORDER BY id_taikhoan  DESC";
                $result_tk = mysqli_query($conn,$sql_tk);
                $row_tk = mysqli_fetch_assoc($result_tk);
                $id_nguoidung = $row_tk['id_taikhoan'] + 1;

                $sql_themnguoidung = "INSERT INTO tb_nguoidung(id_nguoidung, tennguoidung, email) 
                                                VALUES('$id_nguoidung', '$tennguoidung', '$email')";
                $result_themnguoidung = mysqli_query($conn,$sql_themnguoidung);
                $id_taikhoan = $id_nguoidung;
                $code = md5(uniqid(rand(),true));
                $pass_hash = password_hash($matkhau_2,PASSWORD_DEFAULT);
                $sql2 = "INSERT INTO tb_taikhoan(id_taikhoan,tentaikhoan,tennguoidung ,email, matkhau, code, id_nguoidung) VALUES ('$id_taikhoan','$tentaikhoan','$tennguoidung' ,'$email', '$pass_hash', '$code','$id_nguoidung')";
                $result2 = mysqli_query($conn,$sql2);
                if($result2 > 0){
                    sendEmail($email,$code);
                    header('Location: dangki.php?error=Vui lòng kiểm tra email để xác minh đăng kí');
                    exit();
                }else{
                    header('Location: error/error.php');
                }
            }
        }
    }
?>