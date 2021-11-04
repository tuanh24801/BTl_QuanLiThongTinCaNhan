<?php
    include './menu_footer/menu.php';
?>
<!-- menu -->

        <!-- body -->
        <div class="container">
        <div class="body">
            <div class="row">
                <!-- ảnh đại diện và tên người dùng -->
                <div class="col-lg-3">
                    <div class="card avatar_user mt-3">
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
            </div>

            <!-- bài đăng nhiệm vụ người dùng -->
            <div class="row bangtinnhiemvu mt-3">
                
                <div class="col-8 nhiemvu_post">
                    <!-- Form cập nhật nhiệm vụ -->
                    <div class="card text-white bg-secondary mt-3 formnhiemvu mb-2">
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
            <?php                
                $sql_laynhiemvu = "SELECT * FROM tb_nhiemvu WHERE id_nguoidung = '$id_nguoidung' ORDER BY id_nhiemvu DESC";
                $result_laynhiemvu = mysqli_query($conn,$sql_laynhiemvu);
                if(mysqli_num_rows($result_laynhiemvu) > 0){
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
                            <div class="card-body N">
                                <button class="btn alert-success btn_guinv mt-2" id="btn_guinv" data-bs-toggle="modal" data-bs-target="#reg-modal-1" >Gửi cho bạn bè <i class="fal fa-paper-plane"></i></button>
                                <input type="hidden" value="<?php echo $row['id_nhiemvu'] ?>" name = "id_xoa" id="id_xoa">
                                <button type="button" class="btn alert-danger btnxoa mt-2" >xóa<i class="fal fa-trash-alt"></i></button>
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

                    <!-- Modal nhiệm vụ-->
                    <div class="modal fade" id="reg-modal-1" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content p-4">
                                <h4>Chọn người nhận</h4>
                                <div class="col-12 banbe_user p-3">
                                    <div class="row">
                                        <div class="col d-flex mb-1">
                                            <input type="text" class="form-control me-2" id="txtbanbe_tinnhan" placeholder="Nhập tên bạn bè ....">
                                            <button class="btn btn-outline-success" type="submit" name = "timkiem" id="timkiembanbe_tinnhan" ><i class="far fa-search"></i></button>
                                        </div>
                                    </div>
                                    <!-- danh sách bạn bè -->
                                    <ul class="list-group">
                                    <?php
                                        $sql_banbe = "SELECT * FROM tb_banbe WHERE banbe_from = '$id_nguoidung'";
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
                                                            <input type="hidden" value="<?php echo $row['id_nguoidung']?>" name = "id_nhannv" id="id_nhannv">
                                                            <button type="button"  class="btn btnguinhiemvu">
                                                                 <img src="./image_user/avatar_female.png" class="card-img-top" alt="...">
                                                                 <?php echo $row['tennguoidung'] ?>
                                                            </button>
                                                        </li>
                                                    <?php
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                                    </ul>
                                    <!-- kt danh sách bạn bè -->
                                </div>
                            </div>
                        </div>
                        </div>
                    <!-- Modal -->
                    

                 <!-- Lịch hẹn -->
                    <div class="col-4 lichhen mt-3">
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
                                    <input type="hidden" value="<?php echo $row['tenlichhen']?>" name = "tenlich" id="tenlich">
                                    <h5 class="card-header" id="tenlich"><?php echo $row['tenlichhen']?></h5>
                                    <input type="hidden" value="<?php echo $row['thoigian']?>" name = "thoigianlich" id="thoigianlich">
                                    <p class="card-header" id="thoigian_lich">Thời hạn: <?php echo $row['thoigian']?></p>
                                    <div class="card-body N">
                                        <input type="hidden" value="<?php echo $row['noidung']?>" name = "noidunglich" id="noidunglich">
                                        <p class="card-text"><?php echo $row['noidung']?></p>
                                    </div>
                                    <div class="card-body N">
                                        <button class="btn alert-success btn_guinv mt-2" id="btn_guinv" data-bs-toggle="modal" data-bs-target="#reg-modal">Gửi cho bạn bè <i class="fal fa-paper-plane"></i></button>
                                        <input type="hidden" value="<?php echo $row['id_lichhen']?>" name = "id_xoalich" id="id_xoalich">
                                        <button type="button" class="btn alert-danger btnxoalich mt-2">xóa<i class="fal fa-trash-alt"></i></button>
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
                    <!-- Modal lịch hẹn-->
                    <div class="modal fade" id="reg-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content p-4">
                                <h4>Chọn người nhận</h4>
                                <div class="col-12 banbe_user p-3">
                                    <div class="row">
                                        <div class="col d-flex mb-1">
                                            <input type="text" class="form-control me-2" id="txtbanbe_tinnhan" placeholder="Nhập tên bạn bè ....">
                                            <button class="btn btn-outline-success" type="submit" name = "timkiem" id="timkiembanbe_tinnhan" ><i class="far fa-search"></i></button>
                                        </div>
                                    </div>
                                    <!-- danh sách bạn bè -->
                                    <ul class="list-group">
                                    <?php
                                        $sql_banbe = "SELECT * FROM tb_banbe WHERE banbe_from = '$id_nguoidung'";
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
                                                            <input type="hidden" value="<?php echo $row['id_nguoidung']?>" name = "id_nhanlich" id="id_nhanlich">
                                                            <button type="button"  class="btn btnguilichhen">
                                                                 <img src="./image_user/avatar_female.png" class="card-img-top" alt="...">
                                                                 <?php echo $row['tennguoidung'] ?>
                                                            </button>
                                                        </li>
                                                    <?php
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                                    </ul>
                                    <!-- kt danh sách bạn bè -->
                                </div>
                            </div>
                        </div>
                        </div>
                    <!-- Modal -->

            </div>
        </div>
        </div>
        <!-- kt body -->


<!-- footer -->
<?php
    include './menu_footer/footer.php'
?>