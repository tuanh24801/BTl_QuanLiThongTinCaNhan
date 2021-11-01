<?php
session_start();
if (!isset($_SESSION['admin_login'])) {
    header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
}
?>
<?php
    $tennguoidung = $_POST['tennguoidung1'];
    include '../config/config.php';
    $sql_timkiemnguoidung = "SELECT * FROM tb_nguoidung WHERE tennguoidung LIKE '$tennguoidung%'";
  
    $result_timkiemnguoidung  = mysqli_query($conn, $sql_timkiemnguoidung);
    if (mysqli_num_rows($result_timkiemnguoidung) > 0) {
?>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên người dùng</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Chi tiết</th>
            <th scope="col">Xóa</th>
        </tr>
    </thead>
<?php
     while ($row = mysqli_fetch_assoc($result_timkiemnguoidung)) {
?>
    <tbody>
        <tr>
            <th scope="row"><?php echo $row['id_nguoidung'] ?></th>
            <th scope="row"><?php echo $row['tennguoidung'] ?></th>
            <th scope="row"><?php echo $row['sodienthoai'] ?></th>
            <td><a href="chitietnguoidung.php?id=<?php echo $row['id_nguoidung'] ?>" class="btn alert-secondary"><i class="fas fa-info-circle"></i></a></td>
            <td><a href="xoanguoidung.php?id=<?php echo $row['id_nguoidung'] ?>" class="btn alert-light"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    </tbody>
<?php
        }
    } else {
?>
<thead class="alert-light">
    <tr>
        <th scope="col">
            <h5 class="text-center">Không có kết quả j hết</h5>
            <img src="../admin/image_admin/img_notFound.jpg" class="img-fluid" alt="Sample image">
        </th>
    </tr>
</thead>


<?php

    }
?>