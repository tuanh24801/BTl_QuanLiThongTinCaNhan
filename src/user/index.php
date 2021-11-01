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
                        <div class="col">
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
                                <button class="btn btn-outline-warning " type="button" name = "dangnhiemvu" id = "btndangnhiemvu">Đăng bài</button>
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
                                <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/chinhsuathongtin.php">
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
                                <div class="card-header text-center">Lời mời kết bạn</div>
                                <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/loimoiketban.php">
                                    <div class="card-body text-center">
                                        <i class="fal fa-user-plus"></i>
                                    </div>
                                </a>
                            </div>      
                        </div>
                        <!-- kt Ảnh  -->

                        <!-- Nhóm -->
                        <div class="col-sm-3">
                            <div class="card text-red alert-danger mt-3">
                                <div class="card-header text-center">Nhóm</div>
                                <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/nhom.php">
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
                <div class="col-8 nhiemvu_post">
            <?php                
                $sql_laynhiemvu = "SELECT * FROM tb_nhiemvu WHERE id_nguoidung = '$id_nguoidung' ORDER BY id_nhiemvu DESC";
                $result_laynhiemvu = mysqli_query($conn,$sql_laynhiemvu);
                if(mysqli_num_rows($result_laynhiemvu) > 0){
                    while($row = mysqli_fetch_assoc($result_laynhiemvu)){
            ?>
                    <div class="col-12">
                        <div class="card text-black bg-light mb-3">
                            <h5 class="card-header bangtintennhiemvu" id="tennhiemvu"><?php echo $row['tennhiemvu'] ?></h5>
                            <p class="card-header" id="thoigiandang"><?php echo $row['thoigian'] ?></p>
                        <div class="card-body N">
                            <p class="card-text"><?php echo $row['noidung'] ?></p>
                        </div>
                            <div class="card-body N">
                                <button class="btn alert-success btn_guinv" id="btn_guinv">Gửi cho bạn bè <i class="fal fa-paper-plane"></i></button>
                                <input type="hidden" value="<?php echo $row['id_nhiemvu'] ?>" name = "id_xoa" id="id_xoa">
                                <button type="button" class="btn alert-danger btnxoa" data-bs-toggle="modal" data-bs-target="#exampleModal">xóa<i class="fal fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }else{
                        echo '<h5 class="text-center mt-5">Bạn chưa có nhiệm vụ nào</h5>';
                        echo '<img src="./image_user/image_notFound.jpg" class="img-fluid" alt="Sample image" >';
                    }
            ?>
                </div>
            <!-- kt bài đăng nhiệm vụ người dùng -->
                    <div class="col-4 lichhen">
                        <form class="mt-3">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Lịch hẹn</label>
                                <input type="text" class="form-control" id="txttenlichhen" placeholder="Tên lịch hẹn" >
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="txtnoidunglich" placeholder="Nội dung ...">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Thời gian</label>
                                <input type="date" class="form-control" id="txtthoigian">
                            </div>
                            <button class="btn btn-warning " type="button" name = "danglich" id = "btndanglich">Đăng bài</button>
                        </form>

                        <!-- hiển thị danh sách lịch hẹn -->
                        <?php
                            $id_nguoidung  =  $_SESSION['user_login'];            
                            $sql_laylichhen = "SELECT * FROM tb_lichhen WHERE id_nguoidung = '$id_nguoidung' ORDER BY id_lichhen DESC";
                            $result_laylichhen = mysqli_query($conn,$sql_laylichhen);
                            if(mysqli_num_rows($result_laylichhen) > 0){
                                while($row = mysqli_fetch_assoc($result_laylichhen)){
                        ?>
                                <div class="card text-black bg-light mb-3 mt-3">
                                    <h5 class="card-header" id="tenlich"><?php echo $row['tenlichhen']?></h5>
                                    <p class="card-header" id="thoigian_lich">Thời hạn: <?php echo $row['thoigian']?></p>
                                    <div class="card-body N">
                                        <p class="card-text"><?php echo $row['noidung']?></p>
                                    </div>
                                    <div class="card-body N">
                                        <button class="btn alert-success btn_guinv" id="btn_guinv">Gửi cho bạn bè <i class="fal fa-paper-plane"></i></button>
                                        <input type="hidden" value="<?php echo $row['id_lichhen']?>" name = "id_xoalich" id="id_xoalich">
                                        <button type="button" class="btn alert-danger btnxoalich">xóa<i class="fal fa-trash-alt"></i></button>
                                    </div>
                                </div>
                                <?php
                                    }
                                }else{
                                    echo '<h5 class="text-center mt-5">Bạn chưa có lịch hẹn nào</h5>';
                                    echo '<img src="./image_user/image_notFound.jpg" class="img-fluid" alt="Sample image" >';
                                }
                        ?>
                        <!-- kt hiển thị danh sách lịch hẹn -->
                    </div>
   

            </div>
        </div>
        </div>
        <!-- kt body -->


<!-- footer -->
<?php
    include './menu_footer/footer.php'
?>