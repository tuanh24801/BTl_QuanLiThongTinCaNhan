<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
    include '../config/config.php';
?>  
<?php
    if(isset($_GET['loimoi_to'])){
        $loimoi_from = $_SESSION['user_login'];
        $loimoi_to = $_GET['loimoi_to'];
        $sql_kiemtraketban = "SELECT * FROM tb_ketban WHERE loimoi_to = '$loimoi_to' AND loimoi_from = '$loimoi_from'";
        $result_kiemtraketban = mysqli_query($conn,$sql_kiemtraketban);
        if(mysqli_num_rows($result_kiemtraketban)>0){
            header("location: http://localhost/BTL_QuanLiThongTinCaNhan/src/user/timkiem.php");
            exit();
        }
        $sql_ketban = "INSERT INTO tb_ketban(loimoi_from, loimoi_to, trangthai) VALUES ('$loimoi_from', '$loimoi_to','0')";
        $result_ketban = mysqli_query($conn,$sql_ketban);
        if($result_ketban){
            header("location: http://localhost/BTL_QuanLiThongTinCaNhan/src/user/timkiem.php");
            exit();
        }
    }
    

?>
<div class="container">
    <h5 class="text-center mt-5">Danh sách lời mời trống</h5>
    <img src="./image_user/image_notFound.jpg" class="img-fluid" alt="Sample image">
    
</div>
 