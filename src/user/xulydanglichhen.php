<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
?>
<?php
    include '../config/config.php';
    $id_nguoidung = $_SESSION['user_login'];
    $noidung = $_POST['noidung'];
    $tenlichhen = $_POST['tenlichhen'];
    $thoigian = $_POST['thoigian'];
    $sql = "INSERT INTO tb_lichhen(tenlichhen, noidung,thoigian, id_nguoidung)
            VALUES ('$tenlichhen', '$noidung', '$thoigian','$id_nguoidung')";
    $result = mysqli_query($conn,$sql);
?>