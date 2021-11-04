<?php
    include './menu_footer/menu.php';
?>
    <div class="container">
            <form action="" method="post" class="mt-5">
            <h4 class="mt-4 mb-4 text-center">Thêm tài khoản khách</h4>
                <div class="form-group row">
                    <label for="tentaikhoan" class="col-sm-2 col-form-label">Tên tài khoàn</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-2" id="tentaikhoan" name="tentaikhoan">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="tennguoidung" class="col-sm-2 col-form-label">Tên người dùng</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-2" id="tennguoidung" name="tennguoidung">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control mb-2" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="matkhau" class="col-sm-2 col-form-label">Mật khẩu</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-2" id="matkhau" name="matkhau">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="trangthai" class="col-sm-2 col-form-label">Trạng thái</label>
                    <div class="col-sm-4">
                        <select name="trangthai" id="trangthai" class="btn btn-outline-secondary">
                            <option value="1">Kích hoạt</option>;
                            <option value="0">Chưa kích hoạt</option>;
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label for="empPosition" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-success" id="taotaikhoan">Tạo tài khoản</button>
                    </div>
                </div>
            </form>
            <div class="row mt-5">
                    <div class="col-2"><a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/dstaikhoan.php" class="btn btn-success">Quay lại</a></div>
                </div>
            </div>
    </div>
<?php
    include './menu_footer/footer.php'
?>