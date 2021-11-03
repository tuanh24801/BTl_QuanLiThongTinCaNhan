<?php
    include './menu_footer/menu.php';
    $tinnhan_from = $_SESSION['user_login'];
?>  
    <div class="container">
        <div class="profile_user row mt-3 mb-4">
            <div class="img avt col-1">
            </div>
            <!-- ảnh đại diện tên người dùnng -->
            <?php
                include '../config/config.php';
                $id_nguoidung = $_SESSION['user_login'];
                $sql = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = $id_nguoidung";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $tennguoidung = $row['tennguoidung'];
            ?>
            <div class="img avt col-1">
            <?php
                $gioitinh = $row['gioitinh'];
                if($gioitinh == '0'){
                    echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_female.png" class="card-img-top">';
                }else{
                    echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_male.png" class="card-img-top">';
                }
            ?>
            </div>
            <input type="hidden" id="tinnhan_from" value="<?php echo $tinnhan_from ?>" ></input>
            <div class="img name col-8">
                <h4 class="algin"><?php echo $tennguoidung ?></h4>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Tạo nhóm</button>
            </div>
            <!-- ảnh đại diện tên người dùnng -->
        </div>
        <!-- Modal nhóm -->
        
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog p-3">
                    <div class="modal-content p-3">
                    <div class="modal-header ">
                        <h5 class="modal-title" id="exampleModalLabel">Nhóm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="">
                        <form>
                            <div class="">
                                <label for="tennhom" class="col-form-label">Tên nhóm:</label>
                                <input type="text" class="form-control mb-2" id="tennhom">
                                <?php
                                    $sql_id_nhom = "SELECT * FROM tb_nhom ORDER BY id_nhom DESC";
                                    $result = mysqli_query($conn, $sql_id_nhom);
                                    if(mysqli_num_rows($result) > 0){
                                        $row = mysqli_fetch_assoc($result);
                                        $id_nhom = $row['id_nhom']+1;
                                    }else{
                                        $id_nhom = 1;
                                    }
                                ?>
                                <input type="hidden" class="form-control mb-2" value ="<?php echo $id_nhom ?>" id = "id_nhom">
                                <button type="button" class="btn alert-success btntaonhom" >tạo<i class="fal fa-user-plus"></i></button>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Chọn thành viên</label>
                            </div>
                        </form>
                        <!-- ds bạn bè -->
                        <div class="col-12 banbe_user p-3">
                            <div class="row">
                                <div class="col d-flex mb-1">
                                    <input type="text" class="form-control me-2" id="txtbanbe_nhom" placeholder="Nhập tên bạn bè ....">
                                    <button class="btn btn-outline-success" type="submit" name = "timkiem" id="timkiembanbe_nhom" ><i class="far fa-search"></i></button>
                                </div>
                            </div>
                        <ul class="list-group">
                            <?php
                                $tinnhan_from = $_SESSION['user_login'];
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
                                                    <a href="" class="me-5">
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
                                                        <button type="button" class="btn alert-success btnthemtv" >Thêm<i class="fal fa-user-plus"></i></button>

                                                </li>
                                            <?php
                                            }
                                        }
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                    <!-- ds bạn bè -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Modal nhóm -->


        <!-- khung chat -->
        <div class="row tinnhan_box mb-5">
            <div class="col-1"></div>
            <div class="col-3 banbe_user p-3">
                <div class="row">
                    <div class="col d-flex mb-1">
                        <input type="text" class="form-control me-2" id="txtnhom" placeholder="Nhập tên nhóm ....">
                        <button class="btn btn-outline-success" type="submit" name = "timkiem" id="timkiemnhom" ><i class="far fa-search"></i></button>
                    </div>
                </div>
                <!-- danh sách nhóm -->
                <ul class="list-group dsnhom">
                <?php
                    $sql_dsnhom = "SELECT * FROM tb_nhom WHERE id_thanhvien = '$id_nguoidung'";
                    $result_dsnhom = mysqli_query($conn,$sql_dsnhom);
                    if(mysqli_num_rows($result_dsnhom)>0){
                        while($row_dsnhom = mysqli_fetch_assoc($result_dsnhom)){
                            $tennhom = $row_dsnhom['tennhom'];
                            ?>
                                <li class="mt-4 list-group-item" >
                                    <a href="?tinnhan_to_nhom=<?php echo $row_dsnhom['id_nhom'] ?>">
                                    <img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/image_group.png" class="card-img-top" alt="ảnh nhóm">
                                    <?php echo $row_dsnhom['tennhom'] ?>
                                    </a>
                                </li>
                            <?php
                        }
                    }
                
                ?>
                </ul>
                <!-- kt danh sách bạn bè -->
            </div>
            <div class="col-8">
                <div class="khungchat_tong">
                    <div class="khungchat">
                        <div class="Tennhom mb-3">
                            <!-- hiển thị tên người nhận trong đoạn chat -->
                            <h4>
                                <?php
                                    if(isset($_GET['tinnhan_to_nhom'])){
                                        $id_nhom= $_GET['tinnhan_to_nhom'];
                                        $sql_tennhom= "SELECT * FROM tb_nhom WHERE id_nhom= '$id_nhom'";
                                        $result_tennhom = mysqli_query($conn,$sql_tennhom);
                                        if(mysqli_num_rows($result_tennhom)>0){
                                            $row_tennhom = mysqli_fetch_assoc($result_tennhom);
                                                echo '<input type = "text" value = '.$id_nhom.' id = "tinnhan_to_nhom" hidden></input>';
                                                echo $row_tennhom['tennhom'];
                                                
                                        }
                                    }else{
                                        $id_nguoidung = $_SESSION['user_login'];
                                        $sql_dsnhom = "SELECT * FROM tb_nhom WHERE id_thanhvien = '$id_nguoidung'";
                                        $result_dsnhom = mysqli_query($conn,$sql_dsnhom);
                                        if(mysqli_num_rows($result_dsnhom) > 0){
                                            $row_dsnhom = mysqli_fetch_assoc($result_dsnhom);
                                            $id_nhom = $row_dsnhom['id_nhom'];
                                            $sql_nhom= "SELECT * FROM tb_nhom WHERE id_nhom = '$id_nhom' ";
                                            $result_nhom = mysqli_query($conn,$sql_nhom);
                                                $row_nhom = mysqli_fetch_assoc($result_nhom);
                                                $_SESSION['tinnhan_to_nhom'] = $row_nhom['id_nhom'];
                                                echo '<input type = "text" value = '.$_SESSION['tinnhan_to_nhom'].' id = "tinnhan_to_nhom" hidden></input>';
                                                echo $row_nhom['tennhom'];
                                            }
                                        }
                                ?>
                            </h4>
                            <!-- hiển thị tên người nhận trong đoạn chat -->
                        </div>
                        <!-- nội đoạn chat người dùng -->
                        <div class="modal-body1" id="tinnhannhom">
                                <?php
                                    if(isset($_SESSION['tinnhan_to_nhom'])){
                                        $tinnhan_from = $_SESSION['user_login'];
                                        $tinnhan_to_2 = $_SESSION['tinnhan_to_nhom'];
                                        if(isset($_GET['tinnhan_to_nhom'])){
                                            $tinnhan_to = $_GET['tinnhan_to_nhom'];
                                            $sql_chats= "SELECT * FROM tb_tinnhan_nhom 
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
                                            $sql_chats= "SELECT * FROM tb_tinnhan_nhom
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
                                    }
                                ?>
                        </div>
                        <div class="modal-footer d-flex">
                            <input name="" id="noidung_nhom" class="form-control"></input>
                            <button id="guitinnhan_nhom" class="btn btn_guidi" type ="submit" style="height: 70%;"> Gửi <i class="fal fa-paper-plane"></i></button>
                        </div>
                    </div>
                    <!--kt nội dung đoạn chat nhóm -->
                </div>
            </div>
        </div>
        <!-- kt khung chat -->

    </div>
<?php
    include './menu_footer/footer.php';