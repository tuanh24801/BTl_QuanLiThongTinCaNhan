<?php
    include '../config/config.php';
    session_start();
    if(!isset($_SESSION['admin_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang admin thất bại");
    }
?>
<?php
    if(isset($_POST['timkiemnguoidung'])){
        $dulieunhapvao = $_POST['timkiemnguoidung'];
        $sql_user = "SELECT * FROM tb_nguoidung WHERE id_nguoidung != '1' AND tennguoidung LIKE '$dulieunhapvao%'";
        $result_user = mysqli_query($conn,$sql_user);
        if(mysqli_num_rows($result_user)>0){
            while($row = mysqli_fetch_assoc($result_user)){
                ?>
                    <li class="mt-4 list-group-item" >
                        <a href="?tinnhan_to=<?php echo $row['id_nguoidung'] ?>">
                        <?php
                            $gioitinh = $row['gioitinh'];
                            if($gioitinh == '0'){
                                echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_female.png" class="card-img-top" >';
                            }else{
                                echo '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/src/user/image_user/avatar_male.png" class="card-img-top">';
                            }
                        ?>
                        <?php echo $row['tennguoidung'] ?>
                        </a>
                    </li>
                <?php
                }
            }
        }

?>
