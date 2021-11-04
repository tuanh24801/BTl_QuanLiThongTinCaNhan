<?php
    include './menu_footer/menu.php';
    $id_nguoidung = $_GET['id_nguoidung'];
?>
<!-- menu -->

    <!-- body -->
    <div class="container">
        <div class="body">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 p-4">
                    <div class="card avatar_user mt-3">
                        <?php
                            include '../config/config.php';
                            $sql = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = $id_nguoidung";
                            $result = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);
                            $tennguoidung = $row['tennguoidung'];
                            $gioitinh = $row['gioitinh'];
                            if($gioitinh == '0'){
                                echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_female.png" class="card-img-top" class="img-fluid" alt="Sample image">';
                            }else{
                                echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_male.png" class="card-img-top" class="img-fluid" alt="Sample image">';
                            }
                        ?>
                        <div class="col">
                                <h3 class="card-text text-center"><?php echo $tennguoidung ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 mb-4">
                <div class="col-4"></div>
                <div class="col-2 chucnangtrangcanhan">
                    <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/tinnhan.php?tinnhan_to=<?php echo $id_nguoidung ?>">
                        <div class="card-body text-center alert-success icon_trangcanhan">
                            Nhắn tin  <i class="fal fa-comment-alt"></i>
                        </div>
                    </a>
                </div>
                <div class="col-2 chucnangtrangcanhan">
                    <a href="">
                        <div class="card-body text-center alert-success icon_trangcanhan">
                            Thêm nhóm <i class="fal fa-address-card"></i>
                        </div>
                    </a>
                </div>
            </div>
                    
                
            
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 thongtinngdung p-4">
                        <h5>Thông tin người dùng</h5>
                        <?php
                            $sql_ttcanhan = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = '$id_nguoidung'";
                            $result_ttcanhan = mysqli_query($conn,$sql_ttcanhan);
                            if(mysqli_num_rows($result_ttcanhan)>0){
                                $row_ttcanhan = mysqli_fetch_assoc($result_ttcanhan)
                                ?>
                                    <div class="">
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
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 nhiemvu_post mt-3">
                    <h5>Bài viết</h5>
                    <?php                
                        $sql_trangthai = "SELECT * FROM tb_trangthai WHERE id_nguoidung = '$id_nguoidung' ORDER BY id_trangthai DESC";
                        $result_trangthai = mysqli_query($conn,$sql_trangthai);
                        if(mysqli_num_rows($result_trangthai) > 0){
                            $sql = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = $id_nguoidung";
                            $result = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($result);
                                $tennguoidung = $row['tennguoidung'];
                            while($row_trangthai = mysqli_fetch_assoc($result_trangthai)){
                    ?>
                            <div class="col-12">
                                <div class="mb-3 baivietnguoidung p-4">
                                    <h5 class=""><?php echo $tennguoidung ?></h5>
                                    <p class="" id="thoigiandang"><?php echo $row_trangthai['thoigian'] ?></p>
                                    <div class=" N">
                                        <p class=""><?php echo $row_trangthai['noidung'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <br>
                    <?php
                            }
                        }else{
                            echo '<h5 class="text-center mt-5">người dùng chưa cập nhật trạng thái</h5>';
                            echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/image_notFound.jpg" class="img-fluid" alt="Sample image" >';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
        <!-- kt body -->



<!-- footer -->
<?php
    include './menu_footer/footer.php'
?>