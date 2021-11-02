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
                swal("Good job!", "Đăng nhiệm vụ thành công", "success").then((data)=>{
                    location.reload();
                })     

        })

    })
    // kt script cho dang nhiemvu.php

    // script cho dang lich hen
    $('#btndanglich').click(function(){
        var tenlichhen = $('#txttenlichhen').val();
        var noidung = $('#txtnoidunglich').val();
        var thoigian = $('#txtthoigian').val();
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulydanglichhen.php', 
            {tenlichhen : tenlichhen, 
            noidung: noidung,
            thoigian : thoigian   }, 
            function(data){
                swal("Good job!", "Đăng lịch hẹn thành công", "success").then((data)=>{
                    location.reload();
                })     

        })

    })
    // kt script cho dang lich hen

    //script cho xoa nhiem vu
    $('.btnxoa').click(function(){
        var xoa_id = $(this).closest("div").find("#id_xoa").val();
        swal({
            title: "Xóa nhiệm vụ này?",
            text: "Nhiệm vụ đã xóa không thể khôi phục được!!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulyxoanhiemvu.php', 
                {xoanhiemvu_id:xoa_id,
                delete_btn_set: 1},function(data){
                    swal("Đã xóa nhiệm vụ",{
                        icon:"success",
                    }).then((result) =>{
                        location.reload();
                    })
                })
            }
          });
    })
    //kt script cho xoa nhiem vu

    //script cho xoa lich hen
    $('.btnxoalich').click(function(){
        var xoa_id = $(this).closest("div").find("#id_xoalich").val();
        swal({
            title: "Xóa nhiệm vụ này?",
            text: "Nhiệm vụ đã xóa không thể khôi phục được!!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulyxoalichhen.php', 
                {id_lichhen :xoa_id,
                delete_btn_set: 1},function(data){
                    swal("Đã xóa lịch hẹn",{
                        icon:"success",
                    }).then((result) =>{
                        location.reload();
                    })
                })
            }
          });
    })
    //kt script cho xoa lichhen

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
            }).then((result) =>{
                location.reload();
            })
         }
        
        )
    })

    //kt Script cho chỉnh sửa thông tin người dùng

    //script cho tin nhan
    $('#guitinnhan').click(function(){
        $.post(
            'http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulytinnhan.php',
            {noidung: $('#noidung').val(),
            tinnhan_to: $('#tinnhan_to').val(),
            tinnhan_from : $('#tinnhan_from').val(),
            },
            function(data){
                $('#noidung').val("");
                scrollToBottom();
                
            }
        )
    })
    //kt script cho tin nhan

    // script cho Chat realtime
    setInterval(function(){
        $.post(
            'http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulyrealtime.php',
            {
            noidung: $('#noidung').val(),
            tinnhan_to: $('#tinnhan_to').val(),
            tinnhan_from : $('#tinnhan_from').val(),
            },
            function(data){
                if(data != ""){
                    $('.modal-body').html(data);
                    
                }else{
                    scrollToBottom();
                }
            }
        )
    },400);
    //kt script cho Chat realtime

    // function cuộn xuống cuối đoạn chat
    function scrollToBottom(){
        $('.modal-body').scrollTop($('.modal-body')[0].scrollHeight);
      }

    //kt function cuộn xuống cuối đoạn chat
  
    //script cho tìm kiếm bạn bè trong tin nhắn
      $('#txtbanbe_tinnhan').keyup(function(){
        var timkiembanbe = $('#txtbanbe_tinnhan').val();

            $.post(
                'http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulytimkiem_banbetinhan.php',
                {
                    timkiembanbe : timkiembanbe
                },
                function(data){
                    $('.list-group').html(data);
                }
            )
        

      })
    //kt script cho tìm kiếm bạn bè trong tin nhắn

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

    //script cho gửi lịch hẹn
    $('.btnguilichhen').click(function(){
        var id_nhanlich= $(this).closest("li").find("#id_nhanlich").val();
        var tenlich = $('#tenlich').val();
        var thoigianlich = $('#thoigianlich').val();
        var noidunglich = $('#noidunglich').val();
        $.post(
            'http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulyguilichhen.php',
            {
                id_nhanlich: id_nhanlich,
                tenlich : tenlich,
                thoigianlich : thoigianlich,
                noidunglich : noidunglich
            },
            function(data){
                swal("Đã gửi lịch hẹn",{
                    icon:"success",
                })
            }
        )
    })
    //kt script cho gửi lịch hẹn

    //script cho gửi nhiệm vụ
    $('.btnguinhiemvu').click(function(){
        var id_nhannv = $(this).closest("li").find("#id_nhannv").val();
        var tennhiemvu = $('#tennhiemvu').val();
        var noidungnv = $('#noidungnv').val();
        $.post(
            'http://localhost/BTL_QuanLiThongTinCaNhan/src/user/xulyguinhiemvu.php',
            {
                id_nhannv: id_nhannv,
                tennhiemvu : tennhiemvu,
                noidungnv : noidungnv,
            },
            function(data){
                swal("Đã gửi lịch hẹn",{
                    icon:"success",
                })
            }
        )
    })
    //kt script cho gửi nhiệm vụ


})
