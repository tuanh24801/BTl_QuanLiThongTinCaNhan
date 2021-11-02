<?php
    include './menu_footer/menu.php';
    $id_nguoidung = $_GET['id_nguoidung'];
?>
<!-- menu -->

    <!-- body -->
    <div class="container">
        <div class="body">
            <div class="row mb-4">
                <!-- ảnh đại diện và tên người dùng -->
                <div class="col-lg-4 col-md-6">
                    <div class="card avatar_user mt-3">
                        <img src="./image_user/avatar_female.png" class="card-img-top" alt="...">
                        <!-- tên người dùng -->
                        <div class="col">
                            <?php
                                include '../config/config.php';
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
                <div class="col-lg-8 col-md-6 bangthongtincanhan">
                    <!-- Chức năng người dùng -->
                    <div class="row chucnanguser1">
                        <!-- Form cập nhật nhiệm vụ -->
                        <div class="card text-white bg-secondary mt-3 formnhiemvu">
                            <div class="card-header">Thông tin người dùng</div>
                            <div class="p-3">
                                <div class="mt-2">Ngày sinh: </div>
                                <div class="mt-2">Số điện thoại: </div>
                                <div class="mt-2">Email: </div>
                                <div class="mt-2">Địa chỉ: </div>
                            </div>
                            <div class="card-header"></div>
                        </div>
                    <!-- kt Form cập nhật nhiệm vụ -->
                        <div class="col-sm-4 mt-2">
                            <div class="card text-red alert-success">
                                <div class="card-header text-center">Nhắn tin</div>
                                <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php?tinnhan_to=<?php echo $id_nguoidung ?>">
                                    <div class="card-body text-center icon_trangcanhan">
                                        <i class="fal fa-comment-alt"></i>
                                    </div>
                                </a>
                            </div>      
                        </div>
                        <!-- kt Nhắn tin -->

                        <!-- Kết bạnn -->
                        <div class="col-sm-4 mt-2">
                            <div class="card text-red alert-success">
                                <div class="card-header text-center">Kết bạn</div>
                                <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulyguiketban.php?loimoi_to=<?php echo $id_nguoidung ?>">
                                    <div class="card-body text-center icon_trangcanhan">
                                        <i class="fal fa-user-plus"></i>
                                    </div>
                                </a>
                            </div>      
                        </div>
                        <!-- kt Kết bạn  -->
                        <!-- Kết bạnn -->
                        <div class="col-sm-4 mt-2">
                            <div class="card text-red alert-success">
                                <div class="card-header text-center">Mời vào nhóm</div>
                                <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulyguiketban.php?loimoi_to=<?php echo $id_nguoidung ?>">
                                    <div class="card-body text-center icon_trangcanhan">
                                        <i class="fal fa-address-card"></i>
                                    </div>
                                </a>
                            </div>      
                        </div>
                        <!-- kt Kết bạn  -->
                </div>
                <!-- kt ảnh đại diện và tên người dùng -->
            </div>

            <!-- bài đăng nhiệm vụ người dùng -->
            <div class="row bangtinnhiemvu mt-3">
                <div class="col-lg-8 col-md-6 nhiemvu_post">
                <?php                
                $sql_laynhiemvu = "SELECT * FROM tb_nhiemvu WHERE id_nguoidung = '$id_nguoidung' ORDER BY id_nhiemvu DESC";
                $result_laynhiemvu = mysqli_query($conn,$sql_laynhiemvu);
                if(mysqli_num_rows($result_laynhiemvu) > 0){
                    echo '<h5 class="text-center">Nhiệm vụ</h5>';
                    while($row = mysqli_fetch_assoc($result_laynhiemvu)){
                ?>
                    <div class="col-12">
                            <div class="card text-black bg-light mb-3">
                                <input type="hidden" value="<?php echo $row['tennhiemvu'] ?>" name = "tennhiemvu" id="tennhiemvu">
                                <h5 class="card-header bangtintennhiemvu" id="tennhiemvu"><?php echo $row['tennhiemvu'] ?></h5>
                                <p class="card-header" id="thoigiandang"><?php echo $row['thoigian'] ?></p>
                            <div class="card-body N">
                                <input type="hidden" value="<?php echo $row['noidung'] ?>" name = "noidungnv" id="noidungnv">
                                <p class="card-text"><?php echo $row['noidung'] ?></p>
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
                <!-- Lịch hẹn -->
                <div class="col-lg-4 col-md-6 lichhen mt-2 p-2">
                    <!-- hiển thị danh sách lịch hẹn -->
                    <h5 class="text-center">Lịch hẹn</h5>
                    <?php
                        $sql_laylichhen = "SELECT * FROM tb_lichhen WHERE id_nguoidung = '$id_nguoidung' ORDER BY id_lichhen DESC";
                        $result_laylichhen = mysqli_query($conn,$sql_laylichhen);
                        if(mysqli_num_rows($result_laylichhen) > 0){
                            while($row = mysqli_fetch_assoc($result_laylichhen)){
                    ?>
                            <div class="card text-black bg-light mb-3 mt-3">
                                <input type="hidden" value="<?php echo $row['tenlichhen']?>" name = "tenlich" id="tenlich">
                                <h5 class="card-header" id="tenlich"><?php echo $row['tenlichhen']?></h5>
                                <input type="hidden" value="<?php echo $row['thoigian']?>" name = "thoigianlich" id="thoigianlich">
                                <p class="card-header" id="thoigian_lich">Thời hạn: <?php echo $row['thoigian']?></p>
                                <div class="card-body N">
                                    <input type="hidden" value="<?php echo $row['noidung']?>" name = "noidunglich" id="noidunglich">
                                    <p class="card-text"><?php echo $row['noidung']?></p>
                                </div>
                            </div>
                            <?php
                                }
                            }else{
                                echo '<h5 class="text-center mt-5">Bạn chưa có lịch hẹn nào</h5>';
                                echo '<img src="./image_user/image_notFound.jpg" class="img-fluid" alt="Sample image" >';
                            }
                    ?>
                </div>
                <!-- kt hiển thị danh sách lịch hẹn -->
            </div>
        </div>
    </div>
        <!-- kt body -->



<!-- footer -->
<?php
    include './menu_footer/footer.php'
?>