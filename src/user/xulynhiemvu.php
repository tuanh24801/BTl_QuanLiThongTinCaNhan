<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
?>
<?php
    include '../config/config.php';
    $id_nguoidung = $_SESSION['user_login'];
    $tennhiemvu = $_POST['data_1'];
    $noidungnhiemvu = $_POST['data_2'];
    $sql = "INSERT INTO tb_nhiemvu(tennhiemvu, noidung, id_nguoidung)
            VALUES ('$tennhiemvu', '$noidungnhiemvu', '$id_nguoidung')";
    $result = mysqli_query($conn,$sql);
?>