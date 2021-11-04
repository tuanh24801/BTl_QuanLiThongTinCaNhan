<?php
    include './menu_footer/menu.php';
    include '../config/config.php';
    $tinnhan_from = '1';
?>
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="img avt col-1">
            </div>
            <div class="col-8">
                <h4>Tin nhắn hệ thống</h4>
            </div>
        </div>

        <!-- khung chat -->
        <div class="row tinnhan_box mb-5">
            <div class="col-lg-3 col-md-3 col-sm-2 banbe_user p-3">
                <div class="row">
                    <div class="col d-flex mb-1">
                        <input type="text" class="form-control me-2" id="txtnguoidung_tinnhan" placeholder="Nhập tên người dùng ....">
                        <button class="btn btn-outline-success" type="submit" name = "timkiem" id="timkiemnguoidung" ><i class="far fa-search"></i></button>
                    </div>
                </div>
                <!-- danh sách người dùng -->
                <ul class="list-group">
                    <?php
                        $sql_user = "SELECT * FROM tb_nguoidung WHERE id_nguoidung !='1'";
                        $result_user = mysqli_query($conn,$sql_user);
                        if(mysqli_num_rows($result_user)>0){
                            while($row = mysqli_fetch_assoc($result_user)){
                                ?>
                                    <li class="mt-4 list-group-item" >
                                        <a href="?tinnhan_to=<?php echo $row['id_nguoidung'] ?>">
                                        <?php
                                            $gioitinh = $row['gioitinh'];
                                            if($gioitinh == '0'){
                                                echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_female.png" >';
                                            }else{
                                                echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_male.png">';
                                            }
                                        ?>
                                        <?php echo $row['tennguoidung'] ?>
                                        </a>
                                    </li>
                                <?php
                                }
                            }
                    ?>
                </ul>
                <!-- kt danh sách người dùng -->
            </div>
            <div class="col-lg-9 col-md-9 col-sm-10">
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
                                        $sql_to= "SELECT * FROM tb_nguoidung WHERE id_nguoidung !='1'";
                                        $result_to = mysqli_query($conn,$sql_to);
                                        if(mysqli_num_rows($result_to)){
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
                                    if(isset($_SESSION['tinnhan_to'])){
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
                                            }
                                        }
                                    }
                                ?>
                        </div>
                        <div class="modal-footer d-flex">
                            <input name="" id="noidung" class="form-control"></input>
                            <button id="guitinnhan" class="btn btn_guidi" type ="submit" style="height: 70%;"> Gửi <i class="fal fa-paper-plane"></i></button>
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