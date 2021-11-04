<?php
    include './menu_footer/menu.php';
    $id_nhom = $_GET['id_nhom'];
?>
    <div class="container classa">
        <h4 class="text-center mt-4 mb-4 ">Danh sách thành viên nhóm : <a><?php echo $id_nhom?></a></h4>
        <div class="row mt-5">
            <div class="col-2"><button type="button" class="btn btn-success"><a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/dsnhom.php">Quay lại</a></button></div>
            <div class="col-8 d-flex">
                <input type="text" class="form-control me-2" id="txttimkiemtv" placeholder="Nhập thành viên  ...">    
                <button class="btn btn-outline-success " type="submit" name = "timkiem" id="txttimkiemtv" ><i class="far fa-search"></i></button>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row danhsachuser mt-5">
                <?php
                    if(isset($_GET['id_nhom'])){
                        $id_nhom = $_GET['id_nhom'];
                        include '../config/config.php';
                        $sql_dstv = "SELECT * FROM tb_thanhviennhom WHERE id_nhom = '$id_nhom'";
                        $result_dstv= mysqli_query($conn,$sql_dstv);
                        if(mysqli_num_rows($result_dstv)>0){
                            while($row_dstv= mysqli_fetch_assoc($result_dstv)){
                                $id_nguoidung= $row_dstv['id_thanhvien'];

                                $sql_user = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = '$id_nguoidung'";
                                $result_user = mysqli_query($conn,$sql_user);
                                while($row_user = mysqli_fetch_assoc($result_user)){
                                    ?>
                                        <div class="row dsnhom mt-2">
                                            <div class="col-1">#</div>
                                            <div class="col-2">
                                                <?php
                                                    $gioitinh = $row_user['gioitinh'];
                                                    if($gioitinh == '0'){
                                                        echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_female.png" class="card-img-top" class="img-fluid" alt="Sample image">';
                                                    }else{
                                                        echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_male.png" class="card-img-top" class="img-fluid" alt="Sample image">';
                                                    }
                                                ?> 
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-4 tennhom">
                                                <h5><?php echo $row_user['tennguoidung'] ?></h5>
                                            </div>
                                            <div class="col-2">
                                            </div>
                                            <div class="col-2">
                                                <input type="hidden" value="<?php echo $id_nhom ?>" id = "id_nhom">
                                                <input type="hidden" value="<?php echo $row_user['id_nguoidung']?>" id = "id_nguoidung">
                                                <button type = "button" class="btn btn-danger btnxoatv">Xóa thành viên</button>
                                            </div>
                                        </div>    
                                    <?php
                                }
                            }
                        }else{
                            echo '<h4 class="mt-5 text-center">Danh sách thành viên trống</h4>';
                            echo'<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/image_admin/image_1.jpg" class="img-fluid">';
                        }
                }
                ?>
        </div>
    </div>  
<?php
    include './menu_footer/footer.php';
?>