
<?php
    include './menu_footer/menu.php';
?>
<!-- menu -->

        <!-- body -->
        <div class="container">
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
                        </div>
                        <!-- kt tên người dùng -->
                    </div>
                </div>
                <!-- kt ảnh đại diện và tên người dùng -->

                <div class="col-lg-8">
                    <!-- Form cập nhật nhiệm vụ -->
                    <div class="card text-white bg-secondary mt-3 formnhiemvu">
                        <div class="card-header">Nhiệm vụ</div>
                        <div class="card-body">
                            <form action="" method="post">
                                <input type="text" class="form-control mb-3" placeholder="Tên nhiệm vụ" name = "tennhiemvu" id="txttennhiemvu">
                                <input type="text" class="form-control mb-3" placeholder="Nội dung" name = "noidungnhiemvu" id = "txtnoidungnhiemvu">
                                <button class="btn btn-outline-warning " type="submit" name = "dangnhiemvu" id = "btndangnhiemvu">Đăng bài</button>
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
                                <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/banbe.php">
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
                                <div class="card-header text-center">lời mời kết bạn</div>
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
            <div class="row bangtinnhiemvu mt-3">
            <?php                
                $sql_laynhiemvu = "SELECT * FROM tb_nhiemvu WHERE id_nguoidung = '$id_nguoidung' ORDER BY id_nhiemvu DESC";
                $result_laynhiemvu = mysqli_query($conn,$sql_laynhiemvu);
                if(mysqli_num_rows($result_laynhiemvu) > 0){
                    while($row = mysqli_fetch_assoc($result_laynhiemvu)){
                    echo '<div class="col-12">';
                    echo    '<div class="card text-black bg-light mb-3">';
                    echo        '<h5 class="card-header bangtintennhiemvu">'.$row['tennhiemvu'].'</h5>';
                    echo        '<p class="card-header">'.$row['thoigian'].'</p>';
                    echo        '<div class="card-body N">';
                    echo            '<p class="card-text">'.$row['noidung'].'</p>';
                    echo        '</div>';
                    echo        '<div class="card-body N">';
                    echo            '<button class="btn alert-success btn_guinv" id="btn_guinv">Gửi cho bạn bè <i class="fal fa-paper-plane"></i></button>';
                    echo            '<button class="btn alert-danger btn_xoanv" id="btn_xoanv" >Xóa nhiệm vụ <i class="fal fa-trash-alt"></i></button>';
                    echo       '</div>';
                    echo     '</div>';
                    echo '</div>';

                        }
                    }else{
                        //ảnh ở đây
                    }
            ?>
            </div>
            <!-- kt bài đăng nhiệm vụ người dùng -->
            


        </div>
        </div>
        <!-- kt body -->


<!-- footer -->
<?php
    include './menu_footer/footer.php'
?>