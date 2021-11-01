<?php
include './menu_footer/menu.php';
?>
<?php
    $id_nguoidung = $_GET['id'];
    include '../config/config.php';
?>
<div class="container">
        <table class="table table-dark table-hover mt-5 ">
            <h5 class="mt-5">Chi tiết người dùng: '<?php echo $id_nguoidung?>' </h5>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Mã người dùng </th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mã tài khoản</th>
                    <th scope="col">Ảnh đại diện</th>
                    <th scope="col">Giới tính </th>
                </tr>
            </thead>
            <?php
                include '../config/config.php';
                $sql_nguoidung = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = '$id_nguoidung'";
                $result_nguoidung = mysqli_query($conn, $sql_nguoidung);
                if (mysqli_num_rows($result_nguoidung)>0) {
                    while ($row = mysqli_fetch_assoc($result_nguoidung)) {
            ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $row['id_nguoidung'] ?></th>
                            <th scope="row"><?php echo $row['tennguoidung'] ?></th>
                            <th scope="row"><?php echo $row['sodienthoai'] ?></th>
                            <th scope="row"><?php echo $row['ngaysinh'] ?></th>
                            <th scope="row"><?php echo $row['diachi'] ?></th>
                            <th scope="row"><?php echo $row['email'] ?></th>
                            <th scope="row"><?php echo $row['id_taikhoan'] ?></th>
                            <th scope="row"><?php echo $row['anhdaidien'] ?></th>
                            <?php
                                if($row['gioitinh'] == '0'){
                                    echo '<th scope="row">Nữ</th>';
                                }else{
                                    echo '<th scope="row">Nam</th>';
                                }
                            ?>
                        </tr>
                    </tbody>   
            <?php
                    }
                }
            ?>
        </table>
        <div class="row mt-5">
                    <div class="col-2"><a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/dsnguoidung.php" class="btn btn-success">Quay lại</a></div>
                    <div class="col-8"></div>
                    <div class="col-2"></div>
                </div>
            </div>
    </div>

<?php
include './menu_footer/footer.php';
?>