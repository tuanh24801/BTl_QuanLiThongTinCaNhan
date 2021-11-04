<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
?>
<?php
    include '../config/config.php';
    $id_nguoidung = $_SESSION['user_login'];
    $noidung = $_POST['txtnoidungtrangthai'];
    $sql = "INSERT INTO tb_trangthai(noidung, id_nguoidung)
            VALUES ('$noidung', '$id_nguoidung')";
    $result = mysqli_query($conn,$sql);
?>