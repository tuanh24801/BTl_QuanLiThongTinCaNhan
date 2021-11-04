$(document).ready(function(){
    //script cho timkiemtaikhoan
    $('#txttimkiemtaikhoan').keyup(function(){
        var tentaikhoan = $('#txttimkiemtaikhoan').val();
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulytimkiemtaikhoan.php',
            {tentaikhoan: tentaikhoan}, function(data){
                $('.danhsach').html(data);  
                
            }
        )
    })
    //kt script cho timkiemtaikhoan

    //script cho timkiem người dùng
    $('#txttimkiemnguoidung').keyup(function(){
        var tennguoidung = $('#txttimkiemnguoidung').val();
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulytimkiemnguoidung.php',
            {tennguoidung: tennguoidung}, function(data){
                $('.danhsach').html(data);  
                
            }
        )
    })
    //kt script cho timkiem người dùng

    //script cho them tai khoan
    $('#taotaikhoan').click(function(){
        var tentaikhoan = $('#tentaikhoan').val();
        var tennguoidung = $('#tennguoidung').val();
        var email = $('#email').val();
        var matkhau = $('#matkhau').val();
        var trangthai = $('#trangthai').val();
        $.post(
            'http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulythemtaikhoan.php',
            {tentaikhoan: tentaikhoan, tennguoidung: tennguoidung, email: email, matkhau: matkhau, trangthai:trangthai},
            function(data){
                if(data != 'Thêm tài khoản khách thành công'){
                    swal(data,{
                        icon:"warning",
                    })
                }else{
                    swal('Thêm tài khoản khách thành công',{
                        icon:"success",
                    })
                }
            }
        )

    })
    //kt script cho them tai khoan

    //script cho sua tai khoan
    $('#chinhsua').click(function(){
        var id_taikhoan = $('#id_taikhoan').val();
        var tentaikhoan = $('#tentaikhoan').val();
        var tennguoidung = $('#tennguoidung').val();
        var email = $('#email').val();
        var matkhau = $('#matkhau').val();
        var trangthai = $('#trangthai').val();
        $.post(
            'http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulychinhsuataikhoan.php',
            {id_taikhoan: id_taikhoan, tentaikhoan: tentaikhoan, tennguoidung: tennguoidung, email: email, matkhau: matkhau, trangthai:trangthai},
            function(data){
                alert(data);
            }
        )
    })
    //kt script cho sua tai khoan

    //script xóa tài khoản 
    $('.btn_xoatk').click(function(){
        var xoa_id = $(this).closest("tr").find("#xoa_id").val();
        swal({
            title: "Xóa tài khoản này?",
            text: "Tài khoản đã xóa không thể khôi phục được!!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.post(
                  'http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulyxoataikhoan.php', 
                {
                    xoa_id:xoa_id,
                    delete_btn_set: 1
                },function(data){
                    swal("Đã xóa tài khoản",{
                        icon:"success",
                    }).then((result) =>{
                        location.reload();
                    })
                })
            }
          });
    })
    //kt script xóa tài khoản 

    //script tìm kiếm nhiệm vụ 
    $('#txttimkiemnhiemvu').keyup(function(){
        var tennhiemvu = $('#txttimkiemnhiemvu').val();
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulytimkiemnhiemvu.php',
            {tennhiemvu: tennhiemvu}, function(data){
                $('.dsnhiemvu').html(data);  
            }
        )
    })
    //kt script tìm kiếm nhiệm vụ 

    //script xóa nhiệm vụ 
    $('.xoanhiemvu').click(function(){
        var id_nhiemvu = $(this).closest("div").find("#id_nhiemvu").val();
        swal({
            title: "Xóa nhiệm vụ người dùng?",
            text: "Nhiệm vụ đã xóa không thể khôi phục!!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.post(
                  'http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulyxoanhiemvu.php', 
                {
                    id_nhiemvu:id_nhiemvu,
                    delete_btn_set: 1
                },function(data){
                    swal("Đã xóa nhiệm vụ",{
                        icon:"success",
                    }).then((result) =>{
                        location.reload();
                    })
                })
            }
          });
    })
    //kt script xóa nhiệm vụ  

    //script tìm kiếm lịch hẹn
    $('#txttimkiemlichhen').keyup(function(){
        var tenlichhen = $('#txttimkiemlichhen').val();
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulytimkiemlichhen.php',
            {tenlichhen: tenlichhen}, function(data){
                $('.dslichhen').html(data);  
            }
        )
    })
    //kt script tìm kiếm lịch hẹn

    //script xóa lịch hẹn
    $('.xoalich').click(function(){
        var id_lichhen = $(this).closest("div").find("#id_lichhen").val();
        swal({
            title: "Xóa lịch hẹn người dùng?",
            text: "Lịch hẹn đã xóa không thể khôi phục!!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.post(
                  'http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulyxoalichhen.php', 
                {
                    id_lichhen:id_lichhen,
                    delete_btn_set: 1
                },function(data){
                    swal("Đã xóa lịch hẹn",{
                        icon:"success",
                    }).then((result) =>{
                        location.reload();
                    })
                })
            }
          });
    })
    //kt script xóa lịch hẹn



    //script cho tin nhan
    $('#guitinnhan').click(function(){
        $.post(
            'http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulytinnhan.php',
            {
            noidung: $('#noidung').val(),
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
            'http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulyrealtime.php',
            {
            noidung: $('#noidung').val(),
            tinnhan_to: $('#tinnhan_to').val(),
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

    //script cho tìm kiếm người dùng trong tin nhắn
    $('#txtnguoidung_tinnhan').keyup(function(){
        var timkiemnguoidung = $('#txtnguoidung_tinnhan').val();
            $.post(
                'http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulytimkiem_nguoidungtinhan.php',
                {
                    timkiemnguoidung : timkiemnguoidung
                },
                function(data){
                    $('.list-group').html(data);
                }
            )
      })
    //kt script cho tìm kiếm người dùung trong tin nhắn


    //script tìm kiếm nhóm
    $('#txttimkiemnhom').keyup(function(){
        var tennhom = $('#txttimkiemnhom').val();
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulytimkiemnhom.php',
            {
                tennhom: tennhom
            }, function(data){
                $('.danhsachnhom').html(data);  
            }
        )
    })
    //kt script tìm kiếm nhóm

 

    //script xóa thành viên trong nhóm
    $('.btnxoatv').click(function(){
        var id_nhom = $(this).closest("div").find("#id_nhom").val();
        var id_thanhvien= $(this).closest("div").find("#id_nguoidung").val();
        swal({
            title: "Xóa thành viên này?",
            text: "Hành động không thể hoàn tác!!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulyxoathanhviennhom.php',
                {
                    id_nhom: id_nhom,
                    id_thanhvien : id_thanhvien
                }, function(data){
                    swal("Đã xóa thành viên",{
                        icon:"success",
                    }).then((result) =>{
                        location.reload();
                    })  
                }
            )
            }
          });
        
    })
    //kt script xóa thành viên trong nhóm

    //script tìm kiếm người dùng trong nhóm
    $('#txtnguoidung').keyup(function(){
        var tennguoidung = $('#txtnguoidung').val();
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulytimkiemnguoidungnhom.php',
            {
                tennguoidung: tennguoidung
            }, function(data){
                $('.dsnguoidung_nhom').html(data);  
            }
        )
    })
    //kt script tìm kiếm người dùng trong nhóm


    // script tạo nhóm
    $('.btntaonhom').click(function(){
        var tennhom = $(this).closest("div").find("#tennhom").val();
        if(tennhom == ''){
            swal("Vui lòng nhập tên nhóm",{
                icon:"warning",
            })
        }else{
            $.post(
                'http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulytaonhom.php',
                {
                    tennhom : tennhom,
                },
                function(data){
                    swal("Tạo nhóm thành công",{
                        icon:"success",
                    })
                }
            )
        }
    })
    //kt script tạo nhóm

    // script thêm thành viên vào nhóm
    $('.btnthemtv').click(function(){
        var id_nguoidung = $(this).closest("div").find("#id_nguoidung").val();
        $.post(
            'http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulythemthanhvien.php',
            {
                id_nguoidung: id_nguoidung,
            },
            function(data){
                swal("thêm thành viên thành công",{
                    icon:"success",
                })
            }
        )
    })
    //kt script thêm thành viên vào nhóm


    


})