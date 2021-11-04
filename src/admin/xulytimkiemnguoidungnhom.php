
<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
?>
<?php
    include '../config/config.php';
    $tennguoidung = $_POST['tennguoidung'];
    $sql = "SELECT * FROM tb_nguoidung WHERE tennguoidung LIKE '$tennguoidung%' AND id_nguoidung != 1";
    $result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            ?>
                <li class="mt-4 list-group-item" >
                    <div class="row">
                        <div class="col-8">
                            <a href="" class="">
                                <?php
                                    $gioitinh = $row['gioitinh'];
                                    if($gioitinh == '0'){
                                        echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_female.png" class="card-img-top" class="img-fluid" alt="Sample image">';
                                    }else{
                                        echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_male.png" class="card-img-top" class="img-fluid" alt="Sample image">';
                                    }
                                ?>
                                <input type="hidden" value = "<?php echo $row['id_nguoidung'] ?>" id ="id_themtv_nhom">
                                <?php echo $row['tennguoidung'] ?>
                            </a>
                        </div>
                        <div class="col-4 mt-2">
                            <button type="button" class="btn alert-success btnthemtv" >Thêm<i class="fal fa-user-plus"></i></button>
                        </div>
                    </div>
                </li>
            <?php
            }
        }

?>
