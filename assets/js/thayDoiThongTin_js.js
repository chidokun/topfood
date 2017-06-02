$(document).ready(function () {
    $("#gioiTinh > div").click(function () {
        $("#gioiTinh > div").removeClass("t-btn-default");
        $(this).addClass("t-btn-default");

        $("input[name=gioiTinh]").val($(this).html());
    });
});