<?php
    include './menu_footer/menu.php';
    $id_nguoidung = $_SESSION['user_login'];
?>
    <div class="container">
        <form action="" method="post">
            <h4 class="mt-4 mb-4 text-center">Chỉnh sửa thông tin người dùng</h4>
                <?php
                    include '../config/config.php';
                    $sql = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = '$id_nguoidung'";
                    $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                ?>  
                    <div class="form-group row mt-5">
                        <label for="tennguoidung" class="col-sm-2 col-form-label">Tên người dùng</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-2" id="tennguoidung" name="tennguoidung"  value = "<?php echo $row['tennguoidung']?>">
                        </div>
                    </div>
                    <?php
                        if($row['gioitinh'] == '0'){
                            $gioitinh = 'Nữ';
                        }else{
                            $gioitinh = 'Nam';
                        }
                    ?>
                    <div class="form-group row mt-3">
                        <label for="gioitinh" class="col-sm-2 col-form-label">Giới Tính</label>
                        <div class="col-sm-4">
                            <select name="gioitinh" id="gioitinh" class="btn btn-outline-secondary">
                                <option value="<?php echo $row['gioitinh']?>"><?php echo $gioitinh ?></option>
                                <?php
                                    if($row['gioitinh'] == '1'){
                                        echo '<option value="0">Nữ</option>';
                                    }else{
                                        echo '<option value="1">Nam</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="ngaysinh" class="col-sm-2 col-form-label">Ngày Sinh</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control mb-2" id="ngaysinh" name="ngaysinh" value = "<?php echo $row['ngaysinh']?>">
                        </div>
                    </div>
                    

                    <div class="form-group row mt-3">
                        <label for="diachi" class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-2" id="diachi" name="diachi" value = "<?php echo $row['diachi']?>">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="sodienthoai" class="col-sm-2 col-form-label">Di động</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-2" id="sodienthoai" name="sodienthoai" value = "<?php echo $row['sodienthoai']?>">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control mb-2" id="email" name="email" disabled value = "<?php echo $row['email']?>">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="mota" class="col-sm-2 col-form-label">Mô tả chi tiết</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-2" id="mota" name="mota" value = "<?php echo $row['mota']?>">
                        </div>
                    </div>

                    <?php
                    }
                }
                ?>
                <br>
                <div class="form-group row mt-3 mb-5">
                    <label for="btn" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-success mb-5" id="chinhsua">Lưu lại</button>
                    </div>
                </div>
            </form>
        <!-- <img src="./image_user/image_notFound.jpg" class="img-fluid" alt="Sample image"> -->

    </div>
<?php
    include './menu_footer/footer.php';
?>