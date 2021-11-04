<?php
    $email = $_GET['email'];
    $code = $_GET['code'];

    include './config/config.php';
    $sql = "SELECT * FROM tb_taikhoan WHERE email = '$email' AND code = '$code'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) >0){
        $sql_update = "UPDATE tb_taikhoan SET trangthai= 1 WHERE email = '$email'";
        $result_update = mysqli_query($conn,$sql_update);
        if($result_update >0){
            header("location: dangnhap.php?error= kích hoạt tài khoản thành công");
        }else{
            header('Location: error/error.php?error = cập nhật trạng thái thất bại');
        }
    }else{
        echo '<h1>Kích hoạt tài khoản thất bại</h1>';
    }

?>