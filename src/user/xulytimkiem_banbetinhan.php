<?php
    include '../config/config.php';
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
    $dulieunhapvao = $_POST['timkiembanbe'];
    $tinnhan_from = $_SESSION['user_login'];
    
?>
<?php
    $sql_banbe = "SELECT * FROM tb_banbe WHERE banbe_from = '$tinnhan_from'";
    $result_banbe = mysqli_query($conn,$sql_banbe);
    if(mysqli_num_rows($result_banbe)>0){
        while($row_banbe = mysqli_fetch_assoc($result_banbe)){
        $id_banbe = $row_banbe['banbe_to'];
        $sql_user = "SELECT * FROM tb_nguoidung WHERE id_nguoidung = $id_banbe AND tennguoidung LIKE '$dulieunhapvao%'";
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
