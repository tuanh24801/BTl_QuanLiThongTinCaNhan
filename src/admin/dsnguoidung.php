<?php
include './menu_footer/menu.php';
?>
    <div class="container">
        <h4 class="text-center mt-4 mb-4">Danh sách người dùng</h4>
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-8 d-flex">
                <input class="form-control me-2" type="search" id="txttimkiemnguoidung" placeholder="Nhập tên người muốn tìm.." aria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="timkiem" id="timkiemnguoidung"><i class="far fa-search"></i></button>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row khongkq"></div>
        <table class="table table-dark table-striped mt-5 danhsachnguoidung">
            <?php
            include '../config/config.php'; 
            $sql_nguoidung = "SELECT * FROM tb_nguoidung"; 
            $result_nguoidung = mysqli_query($conn, $sql_nguoidung); 
            if (mysqli_num_rows($result_nguoidung) > 0) {
            ?>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên người dùng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Chi tiết</th>
                        
                    </tr>
                </thead>
                <tbody>
                  
                    <?php
                    while ($row = mysqli_fetch_assoc($result_nguoidung)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['id_nguoidung'] ?></th>
                            <th scope="row"><?php echo $row['tennguoidung'] ?></th>
                            <th scope="row"><?php echo $row['sodienthoai'] ?></th>
                            
                            <td><a href="chitietnguoidung.php?id=<?php echo $row['id_nguoidung'] ?>" class="btn alert-secondary"><i class="fas fa-info-circle"></i></a></td>
                            
                        </tr>
                </tbody>
            <?php
                        }
                    } else {
                        echo '<h4 class="text-center mt-5">không có kết quả</h4>';
                        echo '<img src="../admin/image_admin/img_notFound.jpg" class="img-fluid" alt="Sample image">';
                    }
            ?>
        </table>
    </div>
<?php
    include './menu_footer/footer.php';
?>