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
})