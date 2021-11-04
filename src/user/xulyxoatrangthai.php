<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
?>
<?php
    include '../config/config.php';
    if(isset($_POST['delete_btn_set'])){
        $id_trangthai = $_POST['id_trangthai'];
        $sql_trangthai = "DELETE FROM tb_trangthai WHERE id_trangthai = '$id_trangthai'";
        $result = mysqli_query($conn,$sql_trangthai);
        if($result){
            echo 'xóa thành công';
        }else{
            echo 'xóa thất bại';
        }
    }
    
    
    
?>