<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Trang cá nhân người dùng</title>
  </head>
  <body>
    <div class="container-fluid">
        <!-- menu -->
        <div class="menu row">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-link" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/trangcanhan.php">Trang cá nhân</a>
                <a class="nav-link" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/index.php">Nhiệm vụ/Lịch hẹn</a>
                <a class="nav-link" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/timkiem.php">Tìm kiếm</a>
                <a class="nav-link" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php">Tin nhắn</a>
                <a class="nav-link" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/nhom.php">Nhóm</a>
                <div class="btn-group chucnang">
                    <button type="button" class="btn alert-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fal fa-cogs"></i>  
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Tài khoản</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/dangxuat.php">Đăng xuất</a></li>
                    </ul>
                </div>
            </nav>
            



        </div>
        <!-- kt menu -->