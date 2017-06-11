var base_url = $("#baseurl").attr('href');
$(document).ready(onload);

/**
 * Gán các event cho object cụ thể, trước khi gán phải gỡ bỏ cái cũ để tránh bị nhân lên
 */
function onload() {
    //Sự kiện khi thích 1 đánh giá
    $(".like-review").unbind('click').click(function() {
        likeReview();
    });
    
    //Sự kiện khi thích 1 comment
    $(".like-comment").unbind('click').click(function() {
        likeComment($(this));
    });

    //Sự kiện nhấn nút Bình luận
    $(".comment").unbind('click').click(function() {
        if (!$("#comment").val())
            alert("Bạn cần nhập bình luận");
        else {
            comment();
        }
    });

    //Sự kiện khi xóa một comment
    $(".t-btn-delete").unbind('click').click(function() {
        if (!confirm('Bạn có chắc muốn xóa bình luận này?'))
            e.preventDefault();
        else
            deleteComment($(this));
    });

    //Sự kiện khi đang gõ comment và nhấn Enter
    $('#comment').unbind('keypress').keypress(function (e) {
        var key = e.which;
        if(key == 13) 
        {
            $(".comment").click();
        }
    });   
}

function likeReview() {
    $.post(
        base_url + 'danhGiaDiaDiem/likeReview', // URL 
        {
            MaDGDD : $('#maDGDD').val()
        },  // Data
        function (result) { // Success
            $("#reviewLike").text(result);
            if ($("#reviewLikeBtn").text() == "Thích")
                $("#reviewLikeBtn").text("Bỏ thích");
            else
                $("#reviewLikeBtn").text("Thích");
        }, 
        'text' // dataTyppe
    );
}

function likeComment(btnThich) {
    $.post(
        base_url + 'danhGiaDiaDiem/likeComment', // URL 
        {
            MaBLDD : btnThich.val()
        },  // Data
        function (result) { // Success
            $(".numLikeCmt" + btnThich.val()).text(result);
            if ($(".likeCmt" + btnThich.val()).text() == "Thích")
                $(".likeCmt" + btnThich.val()).text("Bỏ thích");
            else
                $(".likeCmt" + btnThich.val()).text("Thích");
        }, 
        'text' // dataTyppe
    );
}

function comment()
{
    $.post(
        base_url + 'danhGiaDiaDiem/insertBinhLuan', // URL 
        {
            NoiDungBLDD : $('#comment').val(),
            MaDGDD : $('#maDGDD').val()
        },  // Data
        function(result){ // Success
            $('.no-comment').remove();
            $('#commentPane').append(result);
            $('#reviewComment').text($('#commentPane > div').length);
            $("#comment").val("");
            onload();
        }, 
        'text' // dataTyppe
    );
}

function deleteComment(btnXoa) {
    $.post(
        base_url + 'danhGiaDiaDiem/deleteComment', // URL 
        {
            MaBLDD : btnXoa.val(),
        },  // Data
        function(result){ // Success
            $('.cmt' + btnXoa.val()).remove();
            $('#reviewComment').text($('#commentPane > div').length);
        }, 
        'text' // dataTyppe
    );
}