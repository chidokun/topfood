$(document).ready(function () {
    changeValue("phucVu");
    changeValue("chatLuong");
    changeValue("viTri");
    changeValue("khongGian");
    changeValue("giaCaDGDD");
});

function changeValue(tieuChi) {
    $("input[name=" + tieuChi + "]").change( function() {
        $("#"+ tieuChi).html(Number($(this).val()).toFixed(1));
    });
}