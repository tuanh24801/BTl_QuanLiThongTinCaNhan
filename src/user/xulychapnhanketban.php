<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
?>
<?php
    include '../config/config.php';
    $id_nguoinhan = $_SESSION['user_login'];
    $id_nguoigui = $_POST['id_nguoigui'];
    $sql_loimoi = "UPDATE tb_ketban SET trangthai = '1' WHERE loimoi_from = '$id_nguoigui' AND loimoi_to = '$id_nguoinhan' ";
    $result = mysqli_query($conn,$sql_loimoi);
    $banbe_from = $_SESSION['user_login'];
    $banbe_to = $id_nguoigui;
    $sql_themban = "INSERT INTO tb_banbe(banbe_to,banbe_from) VALUES('$banbe_to','$banbe_from')";
    $result_themban = mysqli_query($conn,$sql_themban);
    $sql_themban1 = "INSERT INTO tb_banbe(banbe_to,banbe_from) VALUES('$banbe_from','$banbe_to')";
    $result_themban1 = mysqli_query($conn,$sql_themban1);
?>