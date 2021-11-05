<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
    $tennhom = $_POST['tennhom'];
?>

    
    <?php
        include '../config/config.php';
        $sql_dsnhom = "SELECT * FROM tb_nhom WHERE tennhom LIKE '$tennhom%' ORDER BY id_nhom DESC";
        $result_dsnhom= mysqli_query($conn,$sql_dsnhom);
        if(mysqli_num_rows($result_dsnhom)>0){
            while($row_dsnhom = mysqli_fetch_assoc($result_dsnhom)){
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
        }
    ?>
            
            