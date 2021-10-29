<?php
    include './menu_footer/menu.php';
?>
    <h4>Danh sách bạn bè</h4>
    <div class="body">
        <div class="row trangbanbe">
            <?php
                $id_nguoidung = $_SESSION['user_login'];
                include '../config/config.php';
                $sql = "SELECT * FROM tb_banbe WHERE banbe_from = $id_nguoidung";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result)){
                        $id_nguoidung = $row['banbe_to'];
                        $sql_user = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = $id_nguoidung";
                        $result_user = mysqli_query($conn,$sql_user);
                        if(mysqli_num_rows($result_user) > 0){
                            while($row = mysqli_fetch_assoc($result_user)){
                            ?>
                                <div class="col-lg-3">
                                    <div class="card avatar_friend mt-3">
                                        <img src="./image_user/avatar_female.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text text-center"><a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/index.php?id=.."><?php echo $row['tennguoidung']?></a></p>
                                        </div>
                                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php">
                                            <div class="alert alert-primary text-center" role="alert">
                                                Nhắn tin
                                            </div>
                                        </a>
                                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php">
                                            <div class="alert alert-primary text-center" role="alert">
                                                Hủy kết bạn
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php

                            }
                        }
                    } 
                }
            ?>
            <!-- user bạn -->
            <!-- <div class="col-lg-3">
                <div class="card avatar_friend mt-3">
                    <img src="./image_user/avatar_female.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-center"><a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/index.php?id=..">Tên người dùng</a></p>
                    </div>
                    <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php">
                        <div class="alert alert-primary text-center" role="alert">
                            Nhắn tin
                        </div>
                    </a>
                    <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php">
                        <div class="alert alert-primary text-center" role="alert">
                            Hủy kết bạn
                        </div>
                    </a>
                </div>
            </div> -->
            <!-- kt user bạn -->   
        </div>
    </div>
<?php
    include './menu_footer/footer.php';
?>