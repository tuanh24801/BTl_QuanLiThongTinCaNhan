<?php
    include './menu_footer/menu.php';
    $tinnhan_from = $_SESSION['user_login'];
?>  
    <div class="container">
        <div class="profile_user row mt-3 mb-4">
            <div class="img avt col-1">
            </div>
            <!-- ảnh đại diện tên người dùnng -->
            <div class="img avt col-1">
                <img src="./image_user/avatar_female.png" class="card-img-top" alt="...">
            </div>
            <input type="hidden" id="tinnhan_from" value="<?php echo $tinnhan_from ?>" ></input>
            <?php
                include '../config/config.php';
                $id_nguoidung = $_SESSION['user_login'];
                $sql = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = $id_nguoidung";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $tennguoidung = $row['tennguoidung'];
                }
            ?>
            <div class="img name col-2">
                <h4 class="algin"><?php echo $tennguoidung ?></h4>
            </div>
            <!-- ảnh đại diện tên người dùnng -->
        </div>

        <!-- khung chat -->
        <div class="row tinnhan_box mb-5">
            <div class="col-1"></div>
            <div class="col-3 banbe_user p-3">
                <div class="row">
                    <div class="col d-flex mb-1">
                        <input type="text" class="form-control me-2" id="txtbanbe_tinnhan" placeholder="Nhập tên bạn bè ....">
                        <button class="btn btn-outline-success" type="submit" name = "timkiem" id="timkiembanbe_tinnhan" ><i class="far fa-search"></i></button>
                    </div>
                </div>
                <!-- danh sách bạn bè -->
                <ul class="list-group">
                <?php
                    $sql_banbe = "SELECT * FROM tb_banbe WHERE banbe_from = '$tinnhan_from'";
                    $result_banbe = mysqli_query($conn,$sql_banbe);
                    if(mysqli_num_rows($result_banbe)>0){
                        while($row_banbe = mysqli_fetch_assoc($result_banbe)){
                        $id_banbe = $row_banbe['banbe_to'];
                        $sql_user = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = $id_banbe";
                        $result_user = mysqli_query($conn,$sql_user);
                        if(mysqli_num_rows($result_user)>0){
                            while($row = mysqli_fetch_assoc($result_user)){
                                ?>
                                    <li class="mt-4 list-group-item" >
                                        <a href="?tinnhan_to=<?php echo $row['id_nguoidung'] ?>">
                                        <img src="./image_user/avatar_female.png" class="card-img-top" alt="...">
                                        <?php echo $row['tennguoidung'] ?>
                                        </a>
                                    </li>
                                <?php
                                }
                            }
                        }
                    }
                ?>
                </ul>
                <!-- kt danh sách bạn bè -->
            </div>
            <div class="col-8">
                <div class="khungchat_tong">
                    <div class="khungchat">
                        <div class="Tenuser">
                            <!-- hiển thị tên người nhận trong đoạn chat -->
                            <h4>
                                <?php
                                    if(isset($_GET['tinnhan_to'])){
                                        $id_nguoidung = $_GET['tinnhan_to'];
                                        $sql_to= "SELECT * FROM tb_nguoidung WHERE id_nguoidung= '$id_nguoidung'";
                                        $result_to = mysqli_query($conn,$sql_to);
                                        if(mysqli_num_rows($result_to)>0){
                                            $row_to = mysqli_fetch_assoc($result_to);
                                                echo '<input type = "text" value = '.$id_nguoidung.' id = "tinnhan_to" hidden></input>';
                                                echo $row_to['tennguoidung'];
                                        }
                                    }else{
                                        $tinnhan_from = $_SESSION['user_login'];
                                        $sql_banbe1 = "SELECT * FROM tb_banbe WHERE banbe_from = '$tinnhan_from'";
                                        $result_banbe1 = mysqli_query($conn,$sql_banbe1);
                                            $row_banbe1 = mysqli_fetch_assoc($result_banbe1);
                                            $id_banbe = $row_banbe1['banbe_to'];
                                            $sql_to= "SELECT * FROM tb_nguoidung WHERE id_nguoidung = '$id_banbe' ";
                                            $result_to = mysqli_query($conn,$sql_to);
                                            if(mysqli_num_rows($result_to)>0){
                                                $row_to = mysqli_fetch_assoc($result_to);
                                                $_SESSION['tinnhan_to'] = $row_to['id_nguoidung'];
                                                echo '<input type = "text" value = '.$_SESSION['tinnhan_to'].' id = "tinnhan_to" hidden></input>';
                                                echo $row_to['tennguoidung'];
                                            }
                                    }
                                ?>
                            </h4>
                            <!-- hiển thị tên người nhận trong đoạn chat -->
                        </div>
                        <!-- nội đoạn chat người dùng -->
                        <div class="modal-body" id="msBody">
                                <?php
                                    $tinnhan_from = $_SESSION['user_login'];
                                    $tinnhan_to_2 = $_SESSION['tinnhan_to'];
                                    if(isset($_GET['tinnhan_to'])){
                                        $tinnhan_to = $_GET['tinnhan_to'];
                                        $sql_chats= "SELECT * FROM tb_tinnhan 
                                        WHERE (tinnhan_from = '$tinnhan_from' AND tinnhan_to = '$tinnhan_to') 
                                        OR (tinnhan_from = '$tinnhan_to' AND tinnhan_to = '$tinnhan_from')";
                                        $result_chats= mysqli_query($conn,$sql_chats);
                                        if(mysqli_num_rows($result_chats)>0){
                                            while($row_chat = mysqli_fetch_assoc($result_chats)){
                                                if($row_chat['tinnhan_from'] == $tinnhan_from){
                                                ?>
                                                    <div class="noidungphai">
                                                        <p><?php echo $row_chat['noidung'] ?></p>
                                                    </div>
                                                <?php
                                                }else{
                                                ?>
                                                    <div class="noidungtrai">
                                                        <p><?php echo $row_chat['noidung'] ?></p>
                                                    </div>
                                                <?php
                                                }
                                            }
                                        }else{
                                        }
                                    }else{
                                        $sql_chats= "SELECT * FROM tb_tinnhan 
                                        WHERE (tinnhan_from = '$tinnhan_from' AND tinnhan_to = '$tinnhan_to_2') 
                                        OR (tinnhan_from = '$tinnhan_to_2' AND tinnhan_to = '$tinnhan_from')";
                                        $result_chats= mysqli_query($conn,$sql_chats);
                                        if(mysqli_num_rows($result_chats)>0){
                                            while($row_chat = mysqli_fetch_assoc($result_chats)){
                                                if($row_chat['tinnhan_from'] == $tinnhan_from){
                                                    ?>
                                                        <div class="noidungphai">
                                                            <p><?php echo $row_chat['noidung'] ?></p>
                                                        </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <div class="noidungtrai">
                                                            <p><?php echo $row_chat['noidung'] ?></p>
                                                        </div>
                                                    <?php
                                                }
                                            }
                                        }else{

                                        }
                                    }
                                ?>
                        </div>
                        <div class="modal-footer d-flex">
                            <input name="" id="noidung" class="form-control"></input>
                            <button id="send" class="btn btn_guidi" type ="submit" style="height: 70%;"> Gửi <i class="fal fa-paper-plane"></i></button>
                        </div>
                    </div>
                    <!--kt nội dung đoạn chat người dùng -->
                </div>
            </div>
        </div>
        <!-- kt khung chat -->
    </div>

<?php
    include './menu_footer/footer.php';
?>