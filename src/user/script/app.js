$(document).ready(function(){
    // script cho timkiem.php
    $('#txttimkiemnguoidung').keyup(function(){
        var timkiem = $('#txttimkiemnguoidung').val();
        if( timkiem == ''){ 
            $('.danhsachtimkiem').html(
                '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/image/image_4.jpg" class="img-fluid" alt="Sample image">');
            $('.khongcoketqua').html('');
        }else{
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulytimkiem.php', {data: timkiem }, function(data){
            $('.danhsachtimkiem').html(data);
            if(data == ''){
                $('.khongcoketqua').html('<h5 class="text-center mt-5">không có kết quả</h5>');
                $('.danhsachtimkiem').html(
                    '<img src="http://localhost/BTL_QuanLiThongTinCaNhan/image/image_4.jpg" class="img-fluid mb-5" alt="Sample image">');
            }})}
    })
    // kt script cho timkiem.php

    // script cho dang nhiemvu.php
    $('#btndangnhiemvu').click(function(){
        var tennhiemvu = $('#txttennhiemvu').val();
        var noidungnhiemvu = $('#txtnoidungnhiemvu').val();
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulynhiemvu.php', 
            {data_1 : tennhiemvu, data_2: noidungnhiemvu}, 
            function(data){
                location.reload();

        })

    })
    // kt script cho dang nhiemvu.php


    //script cho chỉnh sửa thông tin người dùng
    $('#chinhsua').click(function(){
        var tennguoidung = $('#tennguoidung').val();
        var gioitinh = $('#gioitinh').val();
        var ngaysinh = $('#ngaysinh').val();
        var diachi = $('#diachi').val();
        var sodienthoai = $('#sodienthoai').val();
        var email = $('#email').val();
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulychinhsuathongtin.php',
        {tennguoidung : tennguoidung,gioitinh : gioitinh,ngaysinh: ngaysinh,diachi : diachi,sodienthoai: sodienthoai,email : email},
         function(data){
            swal("Chỉnh sửa thành công",{
                icon:"success",
            })
         }
        
        )
    })

    //kt Script cho chỉnh sửa thông tin người dùng

})
