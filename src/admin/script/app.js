$(document).ready(function(){
    $('#txttimkiemtaikhoan').keyup(function(){
        var tentaikhoan = $('#txttimkiemtaikhoan').val();
        $.post('http://localhost/BTL_QuanLiThongTinCaNhan/src/admin/xulytimkiemtaikhoan.php',
            {tentaikhoan: tentaikhoan}, function(data){
                $('.danhsach').html(data);
            }
        
        
        )
    })
})