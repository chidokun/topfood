$(document).ready(function () {
    $("#gioiTinh > div").click(function () {
        $("#gioiTinh > div").removeClass("t-btn-default");
        $(this).addClass("t-btn-default");

        $("input[name=gioiTinh]").val($(this).html());
    });

    $("#register").click(function (e) {
        if (!$("#agree").is(":checked")) {
            alert("Bạn cần đồng ý với điều khoản sử dụng để đăng ký tài khoản!");
            e.preventDefault();
        }
        else if ($('#anhDaiDien').get(0).files.length === 0) {
            alert("Bạn có thể thay đổi ảnh đại diện bất cứ lúc nào ở trang cá nhân");
        }
    });

    $(".t-avatar").click(function () {
        $("#anhDaiDien").trigger("click");
    });

    $("#anhDaiDien").change(function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            $(".t-avatar").css("background-image", "url(" + reader.result + ")");
        }
        if (file) {
            reader.readAsDataURL(file);
        }
    });
});