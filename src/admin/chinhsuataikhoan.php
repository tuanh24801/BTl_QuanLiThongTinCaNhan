<?php
    include './menu_footer/menu.php';
?>
    <div class="container">
        <form action="" method="post">
            <h4 class="mt-4 mb-4 text-center">Chỉnh sửa thông tin tài khoản</h4>
                <?php
                    $id_taikhoan = $_GET['id'];
                    include '../config/config.php';
                    $sql = "SELECT * FROM tb_taikhoan WHERE id_taikhoan = '$id_taikhoan'";
                    $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                ?>  
                    <div class="form-group row">
                        <label for="id_taikhoan" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-2" id="id_taikhoan" name="id_taikhoan" disabled value = "<?php echo $row['id_taikhoan']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tentaikhoan" class="col-sm-2 col-form-label">Tên tài khoản</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-2" id="tentaikhoan" name="tentaikhoan" value = "<?php echo $row['tentaikhoan']?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="tennguoidung" class="col-sm-2 col-form-label">Tên người dùng</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-2" id="tennguoidung" name="tennguoidung" value = "<?php echo $row['tennguoidung']?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control mb-2" id="email" name="email" value = "<?php echo $row['email']?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="matkhau" class="col-sm-2 col-form-label">Mật khẩu (không hiển thị)</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-2" id="matkhau" name="matkhau" disabled value = "<?php echo $row['matkhau']?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ngaytao" class="col-sm-2 col-form-label">Ngày tạo</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-2" id="ngaytao" name="ngaytao" disabled value = "<?php echo $row['ngaytao']?>">
                        </div>
                    </div>
                    <?php
                        if($row['trangthai'] == '1'){
                            $trangthai = "kích hoạt";
                        }else{
                            $trangthai = "Chưa kích hoạt";
                        }
                    ?>
                    <div class="form-group row">
                        <label for="trangthai" class="col-sm-2 col-form-label">Trạng thái</label>
                        <div class="col-sm-4">
                            <select name="trangthai" id="trangthai" class="btn btn-outline-secondary">
                                <option value="<?php echo $row['trangthai']?>"><?php echo $trangthai ?></option>
                                <?php
                                    if($row['trangthai'] == '1'){
                                        echo '<option value="0">Chưa kích hoạt</option>';
                                    }else{
                                        echo '<option value="1">kích hoạt</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="muc" class="col-sm-2 col-form-label">Quyền</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-2" id="muc" name="muc" disabled value = "<?php
                                if($row['muc'] == '1'){
                                    echo 'Quản trị hệ thống';
                                }else{
                                    echo 'Người dùng';
                                }
                            ?>">
                        </div>
                    </div>                   
                    <?php
                    }
                }
                ?>
                <br>
                <div class="form-group row">
                    <label for="btn" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-success" id="chinhsua">Lưu lại</button>
                    </div>
                </div>
            </form>
            <div class="row mt-5">
                    <div class="col-2"><a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/dstaikhoan.php" class="btn btn-success">Quay lại</a></div>
                </div>
            </div>
    </div>
<?php
    include './menu_footer/footer.php';
?>