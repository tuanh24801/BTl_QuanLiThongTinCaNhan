<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location: ../dangnhap.php?error= Đăng nhập trang user thất bại");
    }
    include '../config/config.php';
    if(isset($_POST['tinnhan_to'])){
        $tinnhan_from = $_POST['tinnhan_from'];
        $tinnhan_to = $_POST['tinnhan_to'];
        $output = "";
        $sql_chats= "SELECT * FROM tb_tinnhan_nhom 
                    WHERE (tinnhan_from = '$tinnhan_from' AND tinnhan_to = '$tinnhan_to') 
                    OR (tinnhan_from = '$tinnhan_to' AND tinnhan_to = '$tinnhan_from')";
                    $result_chats= mysqli_query($conn,$sql_chats);
                    if(mysqli_num_rows($result_chats)>0){
                        while($row_chat = mysqli_fetch_assoc($result_chats)){
                            if($row_chat['tinnhan_from'] == $tinnhan_from)
                                $output .= '<div class="noidungphai">
                                    <p>'.$row_chat['noidung'].'</p>
                                </div>';
                            else
                                $output .= '<div class="noidungtrai">
                                    <p>'. $row_chat['noidung'] .'</p>
                                </div>';
                        }
                    }
        echo $output;
    }
?>