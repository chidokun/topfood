$(document).ready(function () {
    $("#taoDiaDiem").click(function (e) {
        if ($('#anhDaiDienDD').get(0).files.length === 0) {
            alert("Bạn có thể thay đổi ảnh đại diện của địa điểm bất cứ lúc nào ở trang thông tin địa điểm");
        }
    });

    $(".t-avatar").click(function () {
        $("#anhDaiDienDD").trigger("click");
    });

    $("#anhDaiDienDD").change(function () {
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