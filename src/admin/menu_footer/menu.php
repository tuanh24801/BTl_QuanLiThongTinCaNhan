<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="./css/style.css">
        <title>Trang chủ admin</title>
    </head>
    <body>
        <h1>Hello, world!</h1>

        <div class="container-fluid">
            <!-- menu -->
            <div class="menu row ">
                <nav class="nav nav-pills nav-fill">
                    <a class="nav-link" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/index.php">Danh sách người dùng</a>
                    <a class="nav-link" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/dangxuat.php">Danh sách tài khoản</a>
                    <a class="nav-link" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/banbe.php">Bài viết</a>
                    <a class="nav-link" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php">Nhóm</a>
                    <a class="nav-link" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/dangxuat.php">Đăng xuất</a>
                    <nav class="navbar">
                        <div class="container-fluid">
                            <form class="d-flex" action="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/timkiem.php" method="post">
                                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search" name="timkiem">
                                <button class="btn btn-outline-warning" type="submit" name = "timkiem">Search</button>
                            </form>
                        </div>
                    </nav>
                </nav>
            </div>
            <!-- kt menu -->