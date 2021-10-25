<?php
    if(isset($_POST['btn_dangki'])){
        $tentaikhoan = $_POST['tentaikhoan'];
        $email = $_POST['email'];
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
                $code = md5(uniqid(rand(),true));
                $pass_hash = password_hash($matkhau_2,PASSWORD_DEFAULT);
                $sql2 = "INSERT INTO tb_taikhoan(tentaikhoan, email, matkhau, code) VALUES ('$tentaikhoan', '$email', '$pass_hash', '$code')";
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