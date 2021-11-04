<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
?>
<?php
    include '../config/config.php';
    $id_xoa = $_POST['xoa_id'];
    $sql_xoand = "DELETE FROM tb_nguoidung WHERE id_nguoidung = '$id_xoa'";
    $result_xoand = mysqli_query($conn,$sql_xoand);
    $sql_xoatk = "DELETE FROM tb_taikhoan WHERE id_taikhoan = '$id_xoa'";
    $result_xoatk = mysqli_query($conn,$sql_xoatk);
    
?>
