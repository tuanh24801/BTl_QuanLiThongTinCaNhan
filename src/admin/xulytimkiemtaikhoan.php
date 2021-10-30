<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
?>
<?php
    $tentaikhoan = $_POST['tentaikhoan'];
    include '../config/config.php';
    $sql_timkiemtaikhoan = "SELECT * FROM tb_taikhoan WHERE tentaikhoan LIKE '$tentaikhoan%'";
    $result_timkiemtaikhoan  = mysqli_query($conn,$sql_timkiemtaikhoan);
    if(mysqli_num_rows($result_timkiemtaikhoan)>0){
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
<?php
        while($row = mysqli_fetch_assoc($result_timkiemtaikhoan)){
?>          
            <tbody>
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
?>
            <thead class="alert-light">
                <tr>
                    <th scope="col">
                        <h5 class="text-center">Không có kết quả</h5>
                        <img src="../admin/image_admin/img_notFound.jpg" class="img-fluid" alt="Sample image">
                    </th>               
                </tr>
            </thead>
            
            
<?php
 
    }
?>