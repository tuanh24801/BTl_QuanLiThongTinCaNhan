<?php
    include './menu_footer/menu.php';
?>
<?php
    $id_taikhoan = $_GET['id'];
    include '../config/config.php';
?>
    <div class="container">
        <table class="table table-dark table-hover mt-5 bangtaikhoan">
            <h5 class="mt-5">Chi tiết tài khoản ID : '<?php echo $id_taikhoan?>'</h5>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên tài khoản</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Code</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Trạng thái</th>
                </tr>
            </thead>
            <?php
                include '../config/config.php';
                $sql_taikhoan = "SELECT * FROM tb_taikhoan WHERE id_taikhoan = '$id_taikhoan'";
                $result_taikhoan = mysqli_query($conn,$sql_taikhoan);
                if(mysqli_num_rows($result_taikhoan) > 0){
                    while($row = mysqli_fetch_assoc($result_taikhoan)){
                        
            ?>
                    <tbody>
                        <tr>
                        <th scope="row"><?php echo $row['id_taikhoan']?></th>
                        <th scope="row"><?php echo $row['tentaikhoan']?></th>
                        <th scope="row"><?php echo $row['tennguoidung']?></th>
                        <th scope="row"><?php echo $row['email']?></th>
                        <th scope="row"><?php echo $row['code']?></th>
                        <th scope="row"><?php echo $row['ngaytao']?></th>
                        <?php
                            if($row['trangthai'] == '1'){
                                echo '<th scope="row">Đã kích hoạt</th>';
                            }else{
                                echo '<th scope="row">Chưa kích hoạt</th>';
                            }
                        ?>
                    </tbody>   
            <?php
                    }
                }
            ?>
        </table>
        <div class="row mt-5">
                    <div class="col-2"><a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/dstaikhoan.php" class="btn btn-success">Quay lại</a></div>
                    <div class="col-8"></div>
                    <div class="col-2">
                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/chinhsuataikhoan.php?id=<?php echo $id_taikhoan; ?>" class="btn btn-success">Tùy chỉnh</a>
                    </div>
                </div>
            </div>
    </div>
<?php
    include './menu_footer/footer.php'
?>