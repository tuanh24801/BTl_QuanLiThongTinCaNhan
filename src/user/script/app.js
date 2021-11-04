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
    //script cho tìm kiếm bạn bè trong trang cá nhân
    $('#txtbanbe_trangcanhan').keyup(function(){
        var timkiembanbe1 = $('#txtbanbe_trangcanhan').val();
            $.post(
                'http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulytimkiem_banbetrangcanhan.php',
                {
                    timkiembanbe1 : timkiembanbe1
                },
                function(data){
                    $('.dsbb').html(data);
                }
            )
      })
    //kt script cho tìm kiếm bạn bè trong trang cá nhân

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

     //script cho gửi lời mời kết bạn
     $('#loimoi').click(function(){
        alert('đã nhận');
    })
    // kt script cho gửi lời mời kết bạn

    //script cho chấp nhận lời mới kết bạn
    $('#chapnhan_kb').click(function(){
        var id_nguoigui = $('#id_nguoigui').val();
        $.post(
            'http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulychapnhanketban.php',
            {
                id_nguoigui : id_nguoigui
            },
            function(data){
                swal("Chấp nhận lời mời kết bạn",{
                    icon:"success",
                }).then((result) =>{
                    location.reload();
                })
            }
        )
    })
    //kt script cho chấp nhận lời mới kết bạn

})
