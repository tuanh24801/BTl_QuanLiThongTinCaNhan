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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Hello, world!</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <!--officanvas-->
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample">
                </span>
            </button>
            <!--officanvas-->
            <a class="navbar-brand fw-bold text-uppercase me-auto" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/index.php">Trang chủ Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse my-2 my-lg-0" id="navbarSupportedContent">
                <form class="d-flex ms-auto">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search here.." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search </button> -->
                </form>
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Acount
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="http://localhost/BTL_QuanLiThongTinCaNhan/src/dangxuat.php">Đăng xuất</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--nav-->
    <!--offcanvas-->
    <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                            CORE
                        </div>
                    </li>
                    <li>
                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/index.php" class="nav-link px-3 active">
                            <span><i class="fas fa-tachometer-alt"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                            INTERFACE
                        </div>
                    </li>
                    <li>
                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/dsnguoidung.php" class="nav-link px-3 active">
                            <span><i class="fa fa-user text-light fa-lg mr-3"></i></span>
                            <span>Danh sách người dùng</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/dstaikhoan.php" class="nav-link px-3 active">
                            <span><i class="fa fa-table text-light fa-lg mr-3"></i></span>
                            <span>Danh sách tài khoản</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/nhiemvu.php" class="nav-link px-3 active">
                            <span><i class="fas fa-rocket"></i></i></span>
                            <span>Nhiệm vụ</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/qlnhom.php" class="nav-link px-3 active">
                            <span> <i class="fas fa-user-friends"></i></span>
                            <span>Nhóm</span>
                        </a>
                    </li>
                    <li class="">
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                            ADDONS
                        </div>
                    </li>
                    <li>
                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/qlchat.php" class="nav-link px-3 active">
                            <span><i class="fas fa-comment-dots"></i></span>
                            <span>Chats</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3 active">
                            <span><i class="fas fa-tools"></i></span>
                            <span>Cài Đặt </span>
                        </a>
                    </li>
                </ul>
            </nav>


        </div>
    </div>
    <!--offcanvas-->
    <main class="mt-5 pt-3">
        <div class="container-fluid">