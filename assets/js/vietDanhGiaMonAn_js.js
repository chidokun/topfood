$(document).ready(function () {
    changeValue("huongVi");
    changeValue("cachTrinhBay");
    changeValue("giaCaDGMA");
    changeValue("doHaiLong");
});

function changeValue(tieuChi) {
    $("input[name=" + tieuChi + "]").change( function() {
        $("#"+ tieuChi).html(Number($(this).val()).toFixed(1));
    });
}