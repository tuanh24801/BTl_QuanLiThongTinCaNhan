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
                        <!-- tên người dùng -->
                            <?php
                                include '../config/config.php';
                                $id_nguoidung = $_SESSION['user_login'];
                                $sql = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = $id_nguoidung";
                                $result = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($result);
                                $tennguoidung = $row['tennguoidung'];
                                $gioitinh = $row['gioitinh'];
                                if($gioitinh == '0'){
                                    echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_female.png" class="card-img-top" >';
                                }else{
                                    echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_male.png" class="card-img-top">';
                                }
                            ?>
                            <div class="col">
                                    <h3 class="card-text text-center"><?php echo $tennguoidung ?></h3>
                            </div>
                        <!-- kt tên người dùng -->
                    </div>
                </div>
                <!-- kt ảnh đại diện và tên người dùng -->

                <div class="col-lg-8">
                    <!-- Form cập nhật nhiệm vụ -->
                    <div class="card text-white bg-secondary mt-3 formnhiemvu">
                        <div class="card-header">Thông tin cá nhân</div>
                        <div class="card-body thongtincanhan">
                            <?php
                                $sql_ttcanhan = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = '$id_nguoidung'";
                                $result_ttcanhan = mysqli_query($conn,$sql_ttcanhan);
                                if(mysqli_num_rows($result_ttcanhan)>0){
                                    $row_ttcanhan = mysqli_fetch_assoc($result_ttcanhan)
                                    ?>
                                        <div class="p-1">
                                            <div class="mt">Ngày sinh: <?php echo $row_ttcanhan['ngaysinh']?></div>
                                            <div class="mt-2">Số điện thoại: <?php echo $row_ttcanhan['sodienthoai']?></div>
                                            <div class="mt-2">Email: <?php echo $row_ttcanhan['email']?></div>
                                            <div class="mt-2">Địa chỉ: <?php echo $row_ttcanhan['diachi']?></div>
                                            <div class="mt-2">
                                                <p>
                                                    <?php echo $row_ttcanhan['mota']?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>
                            
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
            <div class="row trangthai mt-3">
                <div class="col-8 trangthainguoidung">
                    <!-- Form cập nhật nhiệm vụ -->
                <div class=" col-12 card text-white formtrangthai mt-3 mb-4">
                    <div class="card-body">
                        <form action="" method="post">
                            <textarea class="form-control mb-2" aria-label="With textarea" placeholder="Cập nhật trạng thái của bạn ....." name = "noidungtrangthai" id = "txtnoidungtrangthai"></textarea>
                            <button class="btn btn-outline-secondary " type="button" name = "Đăng" id = "btntrangthai" >Đăng bài</button>
                        </form>
                    </div>
                </div>
                <!-- kt Form cập nhật nhiệm vụ -->
                <h5>Bài viết của bạn</h5>
                <?php                
                $sql_trangthai = "SELECT * FROM tb_trangthai WHERE id_nguoidung = '$id_nguoidung' ORDER BY id_trangthai DESC";
                $result_trangthai = mysqli_query($conn,$sql_trangthai);
                if(mysqli_num_rows($result_trangthai) > 0){
                    while($row = mysqli_fetch_assoc($result_trangthai)){
                ?>
                    <div class="col-12">
                        <div class="card text-black bg-light mb-3">
                            <p class="card-header" id="thoigiandang"><?php echo $row['thoigian'] ?></p>
                        <div class="card-body N">
                            <p class="card-text"><?php echo $row['noidung'] ?></p>
                        </div>
                            <div class="card-body N">
                                <input type="hidden" value="<?php echo $row['id_trangthai'] ?>" name = "id_trangthai" id="id_trangthai">
                                <button type="button" class="btn alert-danger btnxoatrangthai mt-2" >xóa<i class="fal fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }else{
                        echo '<h5 class="text-center mt-5">Bạn chưa cập nhật trạng thái</h5>';
                        echo '<img src="./image_user/image_notFound.jpg" class="img-fluid" alt="Sample image" >';
                    }
                ?>
                </div>
            <!-- kt bài đăng nhiệm vụ người dùng -->

                    <!-- DS bạn bè -->
                <div class="col-4 mt-3">
                    <div class="row tinnhan_box mb-5">
                        <div class="col-12 banbe_user p-3">
                            <div class="row">
                                <div class="col d-flex mb-1">
                                    <input type="text" class="form-control me-2" id="txtbanbe_trangcanhan" placeholder="Nhập tên bạn bè ....">
                                    <button class="btn btn-outline-success" type="submit" name = "timkiem" id="timkiembanbe_tinnhan" ><i class="far fa-search"></i></button>
                                </div>
                            </div>
                            <!-- danh sách bạn bè -->
                            <ul class="list-group dsbb">
                            <?php
                                $tinnhan_from = $id_nguoidung;
                                $sql_banbe = "SELECT * FROM tb_banbe WHERE banbe_from = '$tinnhan_from'";
                                $result_banbe = mysqli_query($conn,$sql_banbe);
                                if(mysqli_num_rows($result_banbe)>0){
                                    while($row_banbe = mysqli_fetch_assoc($result_banbe)){
                                    $id_banbe = $row_banbe['banbe_to'];
                                    $sql_user = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = $id_banbe";
                                    $result_user = mysqli_query($conn,$sql_user);
                                    if(mysqli_num_rows($result_user)>0){
                                        while($row = mysqli_fetch_assoc($result_user)){
                                            ?>
                                                <li class="mt-4 list-group-item" >
                                                    <a href="?tinnhan_to=<?php echo $row['id_nguoidung'] ?>">
                                                    <?php
                                                        $gioitinh = $row['gioitinh'];
                                                        if($gioitinh == '0'){
                                                            echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_female.png" class="card-img-top" class="img-fluid" alt="Sample image">';
                                                        }else{
                                                            echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_male.png" class="card-img-top" class="img-fluid" alt="Sample image">';
                                                        }
                                                    ?>
                                                    <?php echo $row['tennguoidung'] ?>
                                                    </a>
                                                </li>
                                            <?php
                                            }
                                        }
                                    }
                                }else{
                                    echo '<h5 class="text-center mt-5">Danh sách bạn bè trống</h5>';
                                    echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/image_notFound.jpg" class="img-fluid" alt="Sample image" >';
                                }
                            ?>
                            </ul>
                            <!-- kt danh sách bạn bè -->
                        </div>
                    </div>
                </div>
                    <!-- kt DS bạn bè -->
            </div>
        </div>
    </div>
        <!-- kt body -->


<!-- footer -->
<?php
    include './menu_footer/footer.php'
?>