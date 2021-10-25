<?php
    include './partials/header.php';
?>
    <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng kí tài khoản</p>
                    <?php
                        if(isset($_GET['error'])){
                            echo '<p class="error text-center">'.$_GET['error'].'</p>';
                        }
                    ?>
                    <form class="mx-1 mx-md-4" action="xulydangki.php" method = "post">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="form3Example1c" class="form-control" name = "tentaikhoan"/>
                                <label class="form-label" for="tentaikhoan" name = "tentaikhoan">Tên tài khoản</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input type="email" id="form3Example3c" class="form-control" name="email"/>
                                <label class="form-label" for="email" name="email">Email</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="password" id="matkhau" class="form-control" name = "matkhau"/>
                            <label class="form-label" for="matkhau" name = "matkhau">Mật khẩu</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="password" id="matkhau_2" class="form-control" name = "matkhau_2"/>
                            <label class="form-label" for="matkhau_2" name = "matkhau_2">Nhập lại mật khẩu</label>
                            </div>
                        </div>
                        <div class="form-check d-flex justify-content-center mb-5">
                            <input class="form-check-input me-2" type="checkbox" value="1" id="form2Example3c" name ="checkbox_login"/>
                            <label class="form-check-label" for="form2Example3">
                                Đồng ý với điều khoản sử dụng
                            </label>
                        </div>
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" class="btn btn-primary btn-lg" name = "btn_dangki">Đăng kí</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                    <img src="../image/image_login_2.jpg.png " alt="" class="img-fluid" alt="Sample image">
                    <!-- <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image"> -->


                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
<?php
    include './partials/bottom.php';
?>