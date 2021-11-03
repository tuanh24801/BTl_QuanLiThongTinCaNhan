<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
    $tenlichhen = $_POST['tenlichhen'];
?>
    <?php
        include '../config/config.php';
        $sql_lichhen = "SELECT * FROM tb_lichhen WHERE tenlichhen LIKE '$tenlichhen%' ";
        $result_lichhen= mysqli_query($conn,$sql_lichhen);
        if(mysqli_num_rows($result_lichhen)>0){
            while($row_lichhen = mysqli_fetch_assoc($result_lichhen)){
                    $id_nguoidung = $row_lichhen['id_nguoidung'];
                    $sql_user = "SELECT * FROM tb_nguoidung WHERE id_nguoidung= '$id_nguoidung'";
                    $result_user = mysqli_query($conn,$sql_user);
                    $row_user = mysqli_fetch_assoc($result_user);
                ?>
                    <li class="mt-4 list-group-item lidsnhiemvu" >
                            <div class="row dslichhen">
                                <div class="col-3">
                                        #<?php echo $row_lichhen['id_lichhen'] ?>
                                </div>
                                <div class="col-lg-1 col-md-3 col-sm-2">
                                    <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/trangcanhannguoidung.php?id_nguoidung= <?php echo $row_user['id_nguoidung'] ?>">
                                        <img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_female.png" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-4 col-sm-5">
                                    <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/trangcanhannguoidung.php?id_nguoidung= <?php echo $row_user['id_nguoidung'] ?>">
                                        <h4><?php echo $row_user['tennguoidung'] ?></h4>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-danger">Xóa</button>
                                </div>    
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-3">
                                    <h5>Thời hạn</h5> <p><?php echo $row_lichhen['thoigian'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-3">
                                    <h5>Tên lịch</h5> <p><?php echo $row_lichhen['tenlichhen'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-3">
                                    <h5>Nội dung</h5> <p><?php echo $row_lichhen['noidung'] ?></p>
                                </div>
                            </div>
                    </li>
                <?php
            }
        }
    ?>
            
            