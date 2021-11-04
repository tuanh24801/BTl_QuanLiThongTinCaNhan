<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
?>
<?php
    include '../config/config.php';

    $id_nguoidung = $_SESSION['user_login'];
    $tennguoidung = $_POST['tennguoidung'];
    $gioitinh = $_POST['gioitinh'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sodienthoai'];
    $email = $_POST['email'];
    $mota = $_POST['mota'];
    if($tennguoidung == ''){
        echo('tên người dùng không được để trống');
        exit();
    }
    $sql = "UPDATE tb_nguoidung 
        SET tennguoidung = '$tennguoidung', gioitinh = '$gioitinh', ngaysinh = '$ngaysinh', diachi = '$diachi', sodienthoai = '$sodienthoai', mota = '$mota'
        WHERE id_nguoidung = '$id_nguoidung'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo('Chỉnh sửa thành công');
        $sql = "UPDATE tb_taikhoan
        SET tennguoidung = '$tennguoidung'
        WHERE id_taikhoan = '$id_nguoidung'";
    $result = mysqli_query($conn,$sql);
    }else{
        echo('Chỉnh sửa khôngthành công');
    }

    // echo $tennguoidung.''.$gioitinh.''.$ngaysinh.''.$diachi.''.$sodienthoai.''.$email;
    
    
    
    
?>