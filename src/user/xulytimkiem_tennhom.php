<?php
    include '../config/config.php';
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
?>
<?php
    if(isset($_POST['timkiemnhom'])){
        $dulieunhapvao = $_POST['timkiemnhom'];
        $id_user = $_SESSION['user_login'];
        $sql_nhom = "SELECT * FROM tb_nhom WHERE id_thanhvien = $id_user AND tennhom LIKE '$dulieunhapvao%'";
        $result_nhom = mysqli_query($conn,$sql_nhom);
        if(mysqli_num_rows($result_nhom)>0){
            while($row = mysqli_fetch_assoc($result_nhom)){
                ?>
                    <li class="mt-4 list-group-item" >
                        <a href="?tinnhan_to_nhom=<?php echo $row['id_nhom'] ?>">
                        <img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/image_group.png" class="card-img-top" alt="ảnh nhóm">
                        <?php echo $row['tennhom'] ?>
                        </a>
                    </li>
                <?php
                }
            }
        }
            
?>
