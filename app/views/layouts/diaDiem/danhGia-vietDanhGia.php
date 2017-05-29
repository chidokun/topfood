<script type="text/javascript">
    var slider = new Slider('#ex1', {
    formatter: function(value) {
        return 'Current value: ' + value;
    }
});

</script>
<div class="panel panel-default">
    <div class="panel-heading t-panel-header">Viết đánh giá</div>
    <div class="panel-body">
        <div class="form-group">
            <label for="usr">Tiêu đề</label>
            <input type="text" class="form-control" id="usr" placeholder="Tiêu đề đánh giá...">
        </div>
        <div class="form-group">
            <label for="usr">Nhận xét</label>
            <textarea class="form-control" rows="7" id="comment" placeholder="Viết vài dòng nhận xét..."></textarea>
        </div>
        <div class="form-group">
            <label>Đánh giá các tiêu chí</label>

            <div class="t-tieuchi">
                <div class="t-tieuchi-label">Phục vụ</div>
                <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>
                <div>
                    
                </div>
                
            </div>

        </div>
        <button class="btn btn-default t-btn-default pull-right" style="width: 120px;">Đánh giá</button>
    </div>
</div>