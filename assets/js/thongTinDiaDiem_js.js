$(document).ready(function(){
    $("#deletePlace").click(function(e){
        if (!confirm('Bạn có chắc muốn xóa địa điểm này?\nTất cả các món ăn, đánh giá, bình luận, lượt thích và hình ảnh liên quan sẽ bị xóa!'))
            e.preventDefault();
    });
});