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
    //sript cho timkiemnguoidung
    $('#txttimkiemnguoidung').keyup(function(){
        var tennguoidung = $('#txttimkiemnguoidung').val();
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulytimkiemnguoidung.php',
            {tennguoidung1: tennguoidung}, function(data){
                $('.danhsachnguoidung').html(data);  
                
            }
        )
    })
    

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
                alert(data);
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
})
