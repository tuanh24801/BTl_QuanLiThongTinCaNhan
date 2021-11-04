<?php
    include './menu_footer/menu.php';
    include '../config/config.php';
    $loimoi_to = $_SESSION['user_login'];
    // $loimoi_to = '23';
?>
    <div class="container">
<?php
    $sql_loimoi = "SELECT * FROM tb_ketban WHERE loimoi_to = '$loimoi_to' AND trangthai = '0'";
    $result_loimoi = mysqli_query($conn,$sql_loimoi);
    if(mysqli_num_rows($result_loimoi)>0){
        while($row = mysqli_fetch_assoc($result_loimoi)){
            $id_nguoigui = $row['loimoi_from'];
            $sql_nguoigui = "SELECT * FROM tb_nguoidung WHERE id_nguoidung='$id_nguoigui'";
            $result_nguoigui = mysqli_query($conn,$sql_nguoigui);
            while($row_nguoigui = mysqli_fetch_assoc($result_nguoigui)){
            ?>
                <div class="row form_loimoi mt-2">
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="card avatar_user mt-3">
                            <img src="./image_user/avatar_female.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col-6">
                        <h4><?php echo $row_nguoigui['tennguoidung']?></h4>
                    </div>
                    <div class="col-2">
                        <input type="hidden" value="<?php echo $id_nguoigui ?>" id="id_nguoigui">
                        <button class="btn btn-success" id="chapnhan_kb">Chấp nhận</button>
                    </div>
                </div>
            <?php
            }
            
        }
    }else{
    ?>
        <div class="container">
            <h5 class="text-center mt-5">Danh sách lời mời trống</h5>
            <img src="./image_user/image_notFound.jpg" class="img-fluid" alt="Sample image">
        </div>
    <?php
    }

?>

    </div>
<?php
    include './menu_footer/footer.php'; 
?>