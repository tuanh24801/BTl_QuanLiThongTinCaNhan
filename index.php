<?php   
    session_start();
    if(isset($_SESSION['admin_login'])){
        header("location: ./src/admin/index.php");
        exit();
    }
    elseif(isset($_SESSION['user_login'])){
        header("location: ./src/user/index.php");
        exit();
    }else{
        header("location: ./src/dangnhap.php");
        exit();
    }
    
?>