<?php
    include '../config/config.php';
    $dulieunhapvao = $_POST['data'];
    $sql = "SELECT * FROM tb_nguoidung WHERE tennguoidung LIKE '$dulieunhapvao%'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
    
?>

    <div class="col-md-3 col-sm-4">
        <div class="card avatar_friend mt-3">
            <img src="./image_user/avatar_female.png" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text text-center"><a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/index.php?id=.."><?php echo $row['tennguoidung']?></a></p>
            </div>
            <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php">
                <div class="alert alert-primary text-center" role="alert">
                    nhắn tin
                </div>
            </a>
            <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php">
                <div class="alert alert-info text-center" role="alert">
                    kết bạn
                </div>
            </a>
        </div>
    </div>

<?php
        }
    }
    
?>