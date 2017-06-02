$(document).ready(function(){
    $("#deleteReview").click(function(e){
        if (!confirm('Bạn có chắc muốn xóa đánh giá này?\nTất cả các bình luận, lượt thích liên quan sẽ bị xóa!'))
            e.preventDefault();
    });
});