<?php
    include './menu_footer/menu.php';
?>
    <div class="body">
        <div class="container">
        <div class="row trangbanbe">
            <?php
                $id_nguoidung = $_SESSION['user_login'];
                include '../config/config.php';
                $sql = "SELECT * FROM tb_banbe WHERE banbe_from = $id_nguoidung";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0)
                {
                    echo '<h4 class="mt-3 text-center">Danh sách bạn bè</h4>';
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
                                            <p class="card-text text-center"><a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/trangcanhannguoidung.php?id_nguoidung=<?php echo $row['id_nguoidung']?>"><?php echo $row['tennguoidung']?></a></p>
                                        </div>
                                        <a href="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/tinnhan.php?tinnhan_to=<?php echo $row['id_nguoidung']?>">
                                            <div class="alert alert-primary text-center" role="alert">
                                                Nhắn tin
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="alert alert-info text-center" role="alert">
                                                Bạn bè <i class="far fa-check"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php

                            }
                        }
                    } 
                }else{
                        echo '<h5 class="text-center mt-5">Danh sách bạn bè trống</h5>';
                        echo '<img src="./image_user/image_notFound.jpg" alt="">';
                }
            ?>
        </div>
        </div>
    </div>
<?php
    include './menu_footer/footer.php';
?>