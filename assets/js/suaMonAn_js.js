$(document).ready(function() {
    $("#loaiMonAn > div").click(function () {
        $("#loaiMonAn > div").removeClass("t-btn-default");
        $(this).addClass("t-btn-default");

        $("input[name=maLoaiMonAn]").val($(this).attr('value'));
    });
});