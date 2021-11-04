<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
    $id_nhom = $_POST['id_nhom'];
    $id_thanhvien = $_POST['id_thanhvien'];
?>
<?php
    include '../config/config.php';
    $sql_xoatv = "DELETE FROM tb_thanhviennhom WHERE id_nhom = '$id_nhom' AND id_thanhvien = '$id_thanhvien'";
    $result_xoatv = mysqli_query($conn,$sql_xoatv);
    
?>

    
    
            
            