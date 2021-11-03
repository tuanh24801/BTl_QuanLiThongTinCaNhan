<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
    $tennhiemvu = $_POST['tennhiemvu'];
?>

    
    <?php
        include '../config/config.php';
        $sql_nhiemvu = "SELECT * FROM tb_nhiemvu WHERE tennhiemvu LIKE '$tennhiemvu%'";
        $result_nhiemvu= mysqli_query($conn,$sql_nhiemvu);
        if(mysqli_num_rows($result_nhiemvu)>0){
            while($row_nhiemvu = mysqli_fetch_assoc($result_nhiemvu)){
                    $id_nguoidung = $row_nhiemvu['id_nguoidung'];
                    $sql_user = "SELECT * FROM tb_nguoidung WHERE id_nguoidung= '$id_nguoidung'";
                    $result_user = mysqli_query($conn,$sql_user);
                    $row_user = mysqli_fetch_assoc($result_user);
                ?>
                    <li class="mt-4 list-group-item lidsnhiemvu" >
                            <div class="row dsnhiemvu">
                                <div class="col-2">
                                        #<?php echo $row_nhiemvu['id_nhiemvu'] ?>
                                </div>
                                <div class="col-1">
                                    <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/trangcanhannguoidung.php?id_nguoidung= <?php echo $row_user['id_nguoidung'] ?>">
                                        <img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_female.png" class="img-fluid" alt="Sample image">
                                    </a>
                                </div>
                                <div class="col-7">
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
                                <div class="col-2"></div>
                                <div class="col-3">
                                    <h5>Tên nhiệm vụ</h5> <p><?php echo $row_nhiemvu['tennhiemvu'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-3">
                                    <h5>Nội dung</h5> <p><?php echo $row_nhiemvu['noidung'] ?></p>
                                </div>
                            </div>
                    </li>
                <?php
            }
        }
    ?>
            
            