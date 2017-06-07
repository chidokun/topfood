$(document).ready(function() {
    $("#submit").click(function (e) {
        if ($('#anhDaiDienMA').get(0).files.length === 0) {
           if (!confirm('Nếu không chọn ảnh đại diện, bạn sẽ không thể thay đổi ảnh đại diện sau này!\nTiếp tục?'))
                e.preventDefault();        }
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
        var i = 0;
        var files = $(this)[0].files;
        var reader = new FileReader();
        reader.onloadend = function (e) {
            $("." + i).css("background-image", "url(" + e.target.result + ")");
            loadImage(++i);
        }

        function loadImage(i) {
            if (i >= files.length)
                return;
            $("#hinhAnhBg").append("<div class='" + i + "'></div>");
            $("." + i).css("width", "130px");
            $("." + i).css("height", "130px");
            $("." + i).css("margin", "10px");
            $("." + i).css("border", "1px solid #ddd");
            $("." + i).css("display", "inline-block");
            $("." + i).css("background-size", "cover");
            $("." + i).css("background-position", "center");
       
            if (files[i]) {
                reader.readAsDataURL(files[i]);
            }  
        } 
        
        loadImage(i); 
    });
});