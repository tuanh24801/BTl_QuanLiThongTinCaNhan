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

    //script cho sua tai khoan
    $('#')


})