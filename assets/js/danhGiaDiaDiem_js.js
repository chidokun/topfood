var base_url = 'http://localhost/topfood/';
$(document).ready(function() {
    $(".like-review").click(function() {
        likeReview();
    });
       
    $(".like-comment").click(function() {
        likeComment($(this));
    });

    $(".comment").click(function() {
        if (!$("#comment").val())
            alert("Bạn cần nhập bình luận");
        else
            comment();
    });

    $('#comment').keypress(function (e) {
        var key = e.which;
        if(key == 13) 
        {
            $(".comment").click();
            $("#comment").val("");
        }
    });   
});

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
        }, 
        'text' // dataTyppe
    );
}