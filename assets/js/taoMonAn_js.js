$(document).ready(function() {
    $("#submit").click(function (e) {
        if ($('#anhDaiDienMA').get(0).files.length === 0) {
            alert("Bạn có thể thay đổi ảnh đại diện của món ăn bất cứ lúc nào ở trang thông tin món ăn");
        }
    });

    $("#loaiMonAn > div").click(function () {
        $("#loaiMonAn > div").removeClass("t-btn-default");
        $(this).addClass("t-btn-default");

        $("input[name=maLoaiMonAn]").val($(this).attr('value'));
    });

    $(".t-avatar").click(function () {
        $("#anhDaiDienMA").trigger("click");
    });

    $("#anhDaiDienMA").change(function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            $(".t-avatar").css("background-image", "url(" + reader.result + ")");
        }
        if (file) {
            reader.readAsDataURL(file);
        }
    });

    $("#themHinhAnh").click(function () {
        $("#danhMucHinhAnh").trigger("click");
    });

    $("#danhMucHinhAnh").change(function () {
        $("#hinhAnhBg").empty();
        var files = $(this)[0].files;
        var reader = new FileReader();
        reader.onloadend = function () {
            $("." + i).css("background-image", "url(" + reader.result + ")");
        }

        //không thể load hình đồng bộ
        function loadImage(i) {
            if (i >= files.length)
                return;
            $("#hinhAnhBg").append("<div class='" + i + "'></div>");
            $("." + i).css("width", "150px");
            $("." + i).css("height", "150px");
            $("." + i).css("margin", "10px");
            $("." + i).css("border", "1px solid #ddd");
            $("." + i).css("display", "inline-block");

            if (files[i]) {
                reader.readAsDataURL(files[i]);
            }
            loadImage(i + 1);
        }

        loadImage(0);
    });
});