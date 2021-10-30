<?php
    include './menu_footer/menu.php';
?>
    <div class="container">
        <h4 class="text-center mt-4 mb-4">Danh sách tài khoản</h4>
        <div class="row mt-5">
            <div class="col-2"><a href="themtaikhoan.php" class="btn btn-success">Tạo tài khoản</a></div>
            <div class="col-8 d-flex">
                <input type="text" class="form-control me-2" id="txttimkiemtaikhoan" placeholder="Nhập tên người muốn tìm ... ">    
                <button class="btn btn-outline-success " type="submit" name = "timkiem" id="timkiemtaikhoan" ><i class="far fa-search"></i></button>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row khongkq"></div>
        <table class="table table-dark mt-5 danhsach">  
            <?php
                include '../config/config.php';
                $sql_taikhoan = "SELECT * FROM tb_taikhoan";
                $result_taikhoan = mysqli_query($conn,$sql_taikhoan);
                if(mysqli_num_rows($result_taikhoan) > 0 ){
            ?>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên tài khoản</th>
                        <th scope="col">Tên người dùng</th>
                        <th scope="col">Email</th>
                        <th scope="col">Chi tiết</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tùy chỉnh</th>
                    </tr>
                </thead>
                <tbody>
            <?php


                while($row = mysqli_fetch_assoc($result_taikhoan) ){
            ?>
                <tr>
                <th scope="row"><?php echo $row['id_taikhoan']?></th>
                <th scope="row"><?php echo $row['tentaikhoan']?></th>
                <th scope="row"><?php echo $row['tennguoidung']?></th>
                <th scope="row"><?php echo $row['email']?></th>
                <td><a href = "chitiettaikhoan.php?id=<?php echo $row['id_taikhoan']?>" class="btn alert-secondary"><i class="fas fa-info-circle"></i></a></td>
                <?php
                    if($row['trangthai'] == 1){
                        echo '<td><button class="btn btn-success"><i class="fal fa-user-check"></i></button></td>';
                    }else{
                        echo '<td><button class="btn btn-danger"><i class="fal fa-user-times"></i></button></td>';
                    }
                ?>
                <td><a href = "chinhsuataikhoan.php?id=<?php echo $row['id_taikhoan']?>" class="btn alert-light"><i class="fal fa-user-edit"></i></a></td>
                </tr>
                </tbody> 
            <?php
                    }
                }else{
                    echo '<h4 class="text-center mt-5">không có kết quả</h4>';
                    echo '<img src="../admin/image_admin/img_notFound.jpg" class="img-fluid" alt="Sample image">';
                }
            ?>
            
        </table>
    </div>
<?php
    include './menu_footer/footer.php';
?>