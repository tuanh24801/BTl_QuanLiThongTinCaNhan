<?php
include './menu_footer/menu.php';
?>
<div class="container">
        <h4 class="text-center mt-4 mb-4">Nhiệm vụ</h4>
        
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-8 d-flex">
                <input class="form-control me-2" type="search" id="txttimkiemnguoidung" placeholder="Nhập tên người muốn tìm.." aria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="timkiem" id="timkiemnguoidung"><i class="far fa-search"></i></button>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row khongkq"></div>
        <table class="table table-dark table-striped mt-5 nhiemvu">
            <?php
            include '../config/config.php';
            $sql_nhiemvu =  "SELECT *, tennguoidung from tb_nhiemvu nv, tb_nguoidung nd where nv.id_nguoidung = nd.id_nguoidung";
            $result_nhiemvu = mysqli_query($conn, $sql_nhiemvu);  
            if (mysqli_num_rows($result_nhiemvu) > 0) { 
            ?>
                <thead>
                    <tr>
                        
                        <th scope="col">Tên người dùng</th>
                        <th scope="col">Tên nhiệm vụ</th>
                        <th scope="col">Nội dung nhiệm vụ</th>
                        <th scope="col">Thời gian</th>
                        
                        <th scope="col">Xóa</th>

                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    while ($row = mysqli_fetch_assoc($result_nhiemvu)) {
                    ?>
                        <tr>
                      
                            <th scope="row"><?php echo $row['tennguoidung'] ?></th>
                            <th scope="row"><?php echo $row['tennhiemvu'] ?></th>
                            <th scope="row"><?php echo $row['noidung'] ?></th>
                            <th scope="row"><?php echo $row['thoigian'] ?></th>
                            
                           
                            <td><a href="xoanhiemvu.php?id=<?php echo $row['id_nhiemvu'] ?>" class="btn alert-light"><i class="fal fa-user-edit"></i></a></td>
                        </tr>
                </tbody>
            <?php
                        }
                    } else {
                        echo '<h4 class="text-center mt-5">không có kết quả</h4>';
                        echo '<img src="../admin/image_admin/img_notFound.jpg" class="img-fluid" alt="Sample image">'; //??
                    }
            ?>
        </table>
    </div>
<?php
    include './menu_footer/footer.php';
?>