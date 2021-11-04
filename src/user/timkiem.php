
<?php
    include './menu_footer/menu.php';
?>
    
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-2"></div>
            <div class="col-8 d-flex">
                <input type="text" class="form-control me-2" id="txttimkiemnguoidung" placeholder="Nhập tên người muốn tìm ... ">    
                <button class="btn btn-outline-success" type="submit" name = "timkiem" id="timkiemnguoidung" ><i class="far fa-search"></i></button>
            </div>
            <div class="col-2">
                <!-- <button class="btn btn-outline-success" type="submit" name = "timkiem" id="timkiemnguoidung" >Search</button> -->
            </div>
        </div>
        <div class="khongcoketqua"></div>
        <div class="row mt-5 danhsachtimkiem">
            <img src="../sendEmail" alt="">  
            <img src="http://localhost/BTL_QuanLiThongTinCaNhan/image/image_4.jpg" class="img-fluid" alt="Sample image">
        </div>        
    </div>
<?php
    include './menu_footer/footer.php';
?>