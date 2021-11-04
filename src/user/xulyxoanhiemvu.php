<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
?>
<?php
    include '../config/config.php';
    if(isset($_POST['delete_btn_set'])){
        $xoanhiemvu_id = $_POST['xoanhiemvu_id'];
        $sql_xoanv = "DELETE FROM tb_nhiemvu WHERE id_nhiemvu = '$xoanhiemvu_id'";
        $result = mysqli_query($conn,$sql_xoanv);
        if($result){
            echo 'xóa thành công';
        }else{
            echo 'xóa thất bại';
        }
    }
    
    
    
?>