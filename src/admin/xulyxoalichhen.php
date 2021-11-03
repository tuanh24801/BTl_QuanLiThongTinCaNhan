<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
?>
<?php
    include '../config/config.php';
    if(isset($_POST['delete_btn_set'])){
        $id_lichhen = $_POST['id_lichhen'];
        $sql_xoalich = "DELETE FROM tb_lichhen WHERE id_lichhen = '$id_lichhen'";
        $result = mysqli_query($conn,$sql_xoalich);
        if($result){
            echo 'xóa thành công';
        }else{
            echo 'xóa thất bại';
        }
    }
    
    
    
?>