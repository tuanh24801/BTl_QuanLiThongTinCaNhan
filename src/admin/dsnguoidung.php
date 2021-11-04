<?php
    include './menu_footer/menu.php';
?>
    <div class="container">
        <h4 class="text-center mt-4 mb-4">Danh sách người dùng</h4>
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-8 d-flex">
                <input type="text" class="form-control me-2" id="txttimkiemnguoidung" placeholder="Nhập tên người muốn tìm ... ">    
                <button class="btn btn-outline-success " type="submit" name = "timkiem" id="timkiemnguoidung" ><i class="far fa-search"></i></button>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row khongkq"></div>
        <table class="table table-dark mt-5 danhsach">  
            <?php
                include '../config/config.php';
                $sql_nguoidung = "SELECT * FROM tb_nguoidung WHERE id_nguoidung != '1'";
                $result_nguoidung = mysqli_query($conn,$sql_nguoidung);
                if(mysqli_num_rows($result_nguoidung) > 0 ){
                ?>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên người dùng</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Chi tiết</th>
                        <th scope="col">Trang cá nhân</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result_nguoidung) ){
            ?>
                <tr>
                    <th scope="row"><?php echo $row['id_nguoidung']?></th>
                    <th scope="row"><?php echo $row['tennguoidung']?></th>
                    <th scope="row"><?php echo $row['ngaysinh']?></th>
                    <th scope="row"><?php echo $row['sodienthoai']?></th>
                    <th scope="row"><?php echo $row['diachi']?></th>
                    <td><a href = "chitietnguoidung.php?id=<?php echo $row['id_nguoidung']?>" class="btn alert-secondary"><i class="fas fa-info-circle"></i></a></td>
                    <td><a href = "trangcanhannguoidung.php?id_nguoidung=<?php echo $row['id_nguoidung']?>" class="btn alert-success">Xem trang cá nhân<i class="fal fa-eye"></i></a></td>
                </tr>
                </tbody> 
            <?php
                }
                }else{
                        echo '<h4 class="mt-5 text-center">Danh sách người dùng trống</h4>';
                        echo'<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/image_admin/image_1.jpg" class="img-fluid">';
                }
            ?>
        </table>
    </div>
<?php
    include './menu_footer/footer.php';
?>