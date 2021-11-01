<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
    include '../config/config.php';
    $tinnhan_from = $_SESSION['user_login'];
    $dulieunhapvao = $_POST['data'];
    $sql = "SELECT * FROM tb_nguoidung WHERE tennguoidung LIKE '$dulieunhapvao%'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
    
?>

    <div class="col-md-3 col-sm-4">
        <div class="card box_user_timkiem mt-3">
            <img src="./image_user/avatar_female.png" class="card-img-top" alt="...">
            <div class="card-body ten_user_timkiem">
                <p class="card-text text-center"><a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/index.php?id=.."><?php echo $row['tennguoidung']?></a></p>
            </div>
            <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php?tinnhan_to=<?php echo $row['id_nguoidung']?>">
                <div class="alert alert-primary text-center tinnhan_timkiem" role="alert">
                    nhắn tin
                </div>
            </a>
            <!-- xử lý -->
            <?php
                $banbe_to = $row['id_nguoidung'];
                $sql_banbe = "SELECT * FROM tb_banbe WHERE banbe_from = '$tinnhan_from' AND banbe_to = '$banbe_to'";
                $result_banbe = mysqli_query($conn,$sql_banbe);{
                    if(mysqli_num_rows($result_banbe)>0){
                    ?>
                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php">
                            <div class="alert alert-info text-center" role="alert">
                                bạn bè <i class="far fa-check"></i>
                            </div>
                        </a>
                    <?php
                    }else{
                    ?>
                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php">
                            <div class="alert alert-danger text-center" role="alert">
                                kết bạn
                            </div>
                        </a>
                    <?php
                    }
                }
            ?>
            
            <!-- xử lý -->
        </div>
    </div>

<?php
        }
    }
    
?>