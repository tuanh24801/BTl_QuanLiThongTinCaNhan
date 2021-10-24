<?php
    $conn = mysqli_connect('localhost','root','','db_qlttcanhan');
    if(!$conn){
        header('location: ./error/error.php');
    }

?>