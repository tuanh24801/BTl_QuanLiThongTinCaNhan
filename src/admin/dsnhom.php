<?php
    include './menu_footer/menu.php';
?>
    <div class="container">
        <h4 class="text-center mt-4 mb-4">Danh sách Nhóm người dùng</h4>
        <div class="row mt-5">
            <div class="col-2"> 
            </div>
            <div class="col-8 d-flex">
                <input type="text" class="form-control me-2" id="txttimkiemnhom" placeholder="Nhập tên nhóm  ...">    
                <button class="btn btn-outline-success " type="submit" name = "timkiem" id="txttimkiemnhom" ><i class="far fa-search"></i></button>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row danhsachnhom mt-5">
                <?php
                    include '../config/config.php';
                    $sql_dsnhom = "SELECT * FROM tb_nhom ORDER BY id_nhom DESC";
                    $result_dsnhom= mysqli_query($conn,$sql_dsnhom);
                    if(mysqli_num_rows($result_dsnhom)>0){
                        while($row_dsnhom = mysqli_fetch_assoc($result_dsnhom)){
                            $id_nhom = $row_dsnhom['id_nhom'];
                            ?>
                                <div class="row dsnhom mt-2">
                                    <div class="col-1">#<?php echo $row_dsnhom['id_nhom']?></div>
                                    <div class="col-2">
                                        <img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/image_group.png" class="img-fluid" alt="ảnh nhóm">
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-4 tennhom">
                                        <h5><?php echo $row_dsnhom['tennhom'] ?></h5>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-2 classa">
                                        <input type="hidden" value = "<?php echo $row_dsnhom['id_nhom']?>" id="id_nhom">
                                        <button type="button" class="btn btn-info btnxemthanhvien">
                                            <a href="dsthanhviennhom.php?id_nhom=<?php echo $row_dsnhom['id_nhom']; ?>">xem thành viên</a>  
                                        </button>
                                    </div>
                                </div>
                            <?php
                        }
                    }else{
                        echo '<h4 class="mt-5 text-center">Danh sách nhóm trống</h4>';
                        echo'<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/image_admin/image_1.jpg" class="img-fluid">';
                    }
                ?>
        </div>
    </div>  
<?php
    include './menu_footer/footer.php';
?>