<?php
    include './menu_footer/menu.php';
?>
<!-- menu -->

        <!-- body -->
        <div class="body">
            <div class="row">
                <!-- ảnh đại diện và tên người dùng -->
                <div class="col-lg-4">
                    <div class="card avatar_user mt-3">
                        <img src="./image_user/avatar_female.png" class="card-img-top" alt="...">
                        <!-- tên người dùng -->
                        <div class="card-body">
                            <?php
                                include '../config/config.php';
                                $id_nguoidung = $_SESSION['user_login'];
                                $sql = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = $id_nguoidung";
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result) > 0){
                                    $row = mysqli_fetch_assoc($result);
                                    $tennguoidung = $row['tennguoidung'];
                                }
                                echo '<h3 class="card-text text-center">'.$tennguoidung.'</h3>';
                            ?>
                            <!-- <h3 class="card-text text-center">Tên người dùng</h3> -->
                        </div>
                        <!-- kt tên người dùng -->
                    </div>
                </div>
                <!-- kt ảnh đại diện và tên người dùng -->

                <div class="col-lg-8">
                    <!-- Form cập nhật nhiệm vụ -->
                    <div class="card text-white bg-secondary mt-3 formnhiemvu">
                        <div class="card-header">Nhiệm vụ</div>
                        <div class="card-body container-fluid">
                            <form action="">
                                <input type="text" class="form-control mb-3" placeholder="Tên nhiệm vụ" name = "tennhiemvu">
                                <input type="text" class="form-control mb-3" placeholder="Nội dung" name = "noidungnhiemvu">
                                <button class="btn btn-outline-warning " type="submit" name = "dangbai">Đăng bài</button>
                            </form>
                        </div>
                    </div>
                    <!-- kt Form cập nhật nhiệm vụ -->

                    <!-- Chức năng người dùng -->
                    <div class="row chucnanguser">
                        <!-- sửa thông tin -->
                        <div class="col-sm-3">
                            <div class="card text-red alert-danger mt-3">
                                <div class="card-header text-center">Chỉnh sửa thông tin</div>
                                <a href="">
                                    <div class="card-body text-center">
                                        <i class="fal fa-user-edit"></i>
                                    </div>
                                </a>
                            </div>      
                        </div>
                        <!-- kt sửa thông tin -->

                        <!-- danh sách bạn bè  -->
                        <div class="col-sm-3">
                            <div class="card text-red alert-danger mt-3">
                                <div class="card-header text-center">Danh sách bạn bè</div>
                                <a href="">
                                    <div class="card-body text-center">
                                        <i class="fal fa-user-friends"></i>
                                    </div>
                                </a>
                            </div>      
                        </div>
                        <!-- kt danh sách bạn bè  -->

                        <!-- Ảnh cá nhân -->
                        <div class="col-sm-3">
                            <div class="card text-red alert-danger mt-3">
                                <div class="card-header text-center">Ảnh</div>
                                <a href="">
                                    <div class="card-body text-center">
                                        <i class="fal fa-images"></i>
                                    </div>
                                </a>
                            </div>      
                        </div>
                        <!-- kt Ảnh  -->

                        <!-- Nhóm -->
                        <div class="col-sm-3">
                            <div class="card text-red alert-danger mt-3">
                                <div class="card-header text-center">Nhóm</div>
                                <a href="">
                                    <div class="card-body text-center">
                                        <i class="fal fa-users"></i>
                                    </div>
                                </a>
                            </div>      
                        </div>
                        <!-- kt nhóm  -->

                    </div>
                    <!-- kt Chức năng người dùng -->     
                </div>
            </div>
            <!-- bài đăng nhiệm vụ người dùng -->
            <div class="row nhiemvu mt-3">
                <div class="col-11">
                    <div class="card text-white bg-light mb-3">
                        <p class="card-header"> Tên nhiệm vụ</p>
                        <p class="card-header">20/10/2021 10:12</p>
                        <div class="card-body N">
                            <h5 class="card-title">Tiêu đề</h5>
                            <p class="card-text">phân nội dung .........</p>
                        </div>
                        <div class="card-body N">
                            <button class="btn alert-success">Gửi cho bạn bè <i class="fal fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- kt bài đăng nhiệm vụ người dùng -->
            <!-- bài đăng nhiệm vụ người dùng -->
            <div class="row nhiemvu mt-3">
                <div class="col-11">
                    <div class="card text-white bg-light mb-3">
                        <p class="card-header"> Tên nhiệm vụ</p>
                        <p class="card-header">20/10/2021 10:12</p>
                        <div class="card-body N">
                            <h5 class="card-title">Tiêu đề</h5>
                            <p class="card-text">phân nội dung .........</p>
                        </div>
                        <div class="card-body N">
                            <button class="btn alert-success">Gửi cho bạn bè <i class="fal fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- kt bài đăng nhiệm vụ người dùng -->
            <!-- bài đăng nhiệm vụ người dùng -->
            <div class="row nhiemvu mt-3">
                <div class="col-11">
                    <div class="card text-white bg-light mb-3">
                        <p class="card-header"> Tên nhiệm vụ</p>
                        <p class="card-header">20/10/2021 10:12</p>
                        <div class="card-body N">
                            <h5 class="card-title">Tiêu đề</h5>
                            <p class="card-text">phân nội dung .........</p>
                        </div>
                        <div class="card-body N">
                            <button class="btn alert-success">Gửi cho bạn bè <i class="fal fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- kt bài đăng nhiệm vụ người dùng -->
        </div>
        <!-- kt body -->


<!-- footer -->
<?php
    include './menu_footer/footer.php'
?>