<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
?>
<?php
    include '../config/config.php';
    if(isset($_POST['delete_btn_set'])){
        $id_nhiemvu = $_POST['id_nhiemvu'];
        $sql_xoanv = "DELETE FROM tb_nhiemvu WHERE id_nhiemvu = '$id_nhiemvu'";
        $result = mysqli_query($conn,$sql_xoanv);
        if($result){
            echo 'xóa thành công';
        }else{
            echo 'xóa thất bại';
        }
    }
    
    
    
?>