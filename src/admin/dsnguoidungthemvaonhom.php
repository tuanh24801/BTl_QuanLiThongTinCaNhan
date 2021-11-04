<?php
    include './menu_footer/menu.php';
    $id_nhom = $_GET['id_nhom'];
?>
    <div class="container classa">
        <h4 class="text-center mt-4 mb-4 ">Danh sách người dùng</h4>
        <div class="row mt-5">
            <div class="col-2"><button type="button" class="btn btn-success"><a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/dsnhom.php">Quay lại</a></button></div>
            <div class="col-8 d-flex">
                <input type="text" class="form-control me-2" id="txttimkiemtv" placeholder="Nhập tên người dùng...">    
                <button class="btn btn-outline-success " type="submit" name = "timkiem" id="txttimkiemtv" ><i class="far fa-search"></i></button>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row danhsachuser mt-5">
                <?php
                    include '../config/config.php';
                    $sql_user = "SELECT * FROM tb_nguoidung WHERE id_nguoidung != '1'";
                    $result_user = mysqli_query($conn,$sql_user);
                    while($row_user = mysqli_fetch_assoc($result_user)){
                        $_SESSION['id_nhom_moi'] = $id_nhom;
                        ?>
                            <div class="row dsnhom mt-2">
                                <div class="col-1"># <?php echo $row_user['id_nguoidung']?></div>
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
                                    <button type = "button" class="btn btn-success btnthemtv">Thêm vào nhóm</button>
                                </div>
                            </div>    
                        <?php
                    }

                ?>
        </div>
    </div>  
<?php
    include './menu_footer/footer.php';
?>