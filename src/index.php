<?php
    session_start();
    if(isset($_SESSION['admin_login'])){
        header("location: ./admin/index.php");
        exit();
    }
    elseif(isset($_SESSION['user_login'])){
        header("location: ./user/index.php");
        exit();
    }
?>
<?php
    include './partials/header.php';
?>
    <h1>bạn đã có tài khoản chưa ???</h1>

<?php
    include './partials/bottom.php';
?>