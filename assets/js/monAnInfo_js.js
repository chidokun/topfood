$(document).ready(function(){
    $("#deleteFood").click(function(e){
        if (!confirm('Bạn có chắc muốn xóa món ăn này?\nTất cả các đánh giá, bình luận, lượt thích và hình ảnh liên quan sẽ bị xóa!'))
            e.preventDefault();
    });
});