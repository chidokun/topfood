var base_url = 'http://localhost/topfood/';
$(document).ready(function() {
    $(".like-review").click(likeReview());
    $(".like-comment").click(likeComment());
    $(".comment").click(comment());
});

function likeReview() {

}

function likeComment() {

}

function comment()
{
    $.post(
        base_url + 'danhGiaDiaDiem/insertBinhLuan', // URL 
        {
            NoiDungBLDD : $('#comment').val(),
            MaDGDD : arr[7]

        },  // Data
        function(result){ // Success
            $('#commentPane').append(
                '<div class="panel-footer">\
                    <div class="media">\
                        <div class="t-comment-avatar media-left">\
                            <img src="' + $("#imgNguoiDungNav").attr("src") +
                        '</div>\
                        <div class="media-body">\
                            <div class="t-comment-heading media-body">\
                                <div class="t-danhgia-username pull-left">' + $("#tenNguoiDungNav").html() + '</div>\
                                <div class="t-danhgia-date pull-right">' + result[2] + '</div>\
                            </div>\
                            <div class="t-comment-body">' + result[1] + '</div>\
                        </div>\
                        <div class="t-like-panel media-footer">\
                            <a href="" class="btn btn-default btn-xs pull-left">\
                                <img src=""> Thích</a>\
                            <div class="t-like-count pull-right">\
                                <img src=""> ' + result[3] +
                            '</div>\
                        </div>\
                    </div>\
                </div>'
            );
        }, 
        'json' // dataTyppe
    );
}