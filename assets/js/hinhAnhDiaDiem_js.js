var base_url = $("#baseurl").attr('href');
$(document).ready(onload);

function onload() {
    $(".deleteImage").click(function(e){
        if (!confirm('Bạn có chắc muốn xóa hình ảnh này?'))
            e.preventDefault();
        else
            deletePicture($(this));
    });

    $("#themHinhAnh").click(function(e){
        if($("#hinhAnh").get(0).files.length === 0) {
            alert("Vui lòng chọn hình ảnh trước khi thêm.");
            e.preventDefault();
        }
    });

    $("#chonHinhAnh").click(function(){
        $("#hinhAnh").trigger("click");
    });

    $("#hinhAnh").change(function(){
        if($("#hinhAnh").get(0).files.length !== 0) {
            $("#chonHinhAnh").text('Đã chọn hình')
        }
    });
}

function deletePicture(btnXoa) {
    $.post(
        base_url + 'diaDiem/deleteImage',
        {
            maDiaDiem : $("#maDiaDiem").val(),
            pathDD : btnXoa.val()
        },
        function (result) {
            var x = "#img_" + result.fileDeleted;
            $(x).remove();
        },
        'json'
    );
}