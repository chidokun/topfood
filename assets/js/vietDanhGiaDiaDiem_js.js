$(document).ready(function () {
    changeValue("phucVu");
    changeValue("chatLuong");
    changeValue("viTri");
    changeValue("khongGian");
    changeValue("giaCaDGDD");
});

function changeValue(tieuChi) {
    $("input[name=" + tieuChi + "]").change( function() {
        $("#"+ tieuChi).html($(this).val() / 10);
    });
}