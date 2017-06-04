<script src=<?php echo base_url('assets/js/vietDanhGiaDiaDiem_js.js'); ?>></script>
<div class="panel panel-default">
    <div class="panel-heading t-panel-header">Viết đánh giá</div>
    <?php echo form_open('monAn/insertDanhGia/'.$monAn['MaMonAn']); ?>
    <div class="panel-body">
        <?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
        <div class="form-group">
            <label for="usr">Tiêu đề</label>
            <input type="text" class="form-control" id="tieuDeDGDD" name="tieuDeDGDD" placeholder="Tiêu đề đánh giá..." value="<?php echo set_value('tieuDeDGDD'); ?>">
        </div>
        <div class="form-group">
            <label for="usr">Nhận xét</label>
            <textarea class="form-control" rows="7" id="baiNhanXetDGDD" name="baiNhanXetDGDD" placeholder="Viết vài dòng nhận xét..."><?php echo set_value('baiNhanXetDGDD'); ?></textarea>
        </div>
        <div class="form-group">
            <label>Đánh giá các tiêu chí</label>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Phục vụ</div>
                <div id="phucVu" class="t-danhgia-tieuchi-header-score pull-right">8.0</div>
                <input type="range" name="phucVu" min="0" step="1" max="10" value="8">                                               
            </div>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Chất lượng</div>
                <div id="chatLuong" class="t-danhgia-tieuchi-header-score pull-right">8.0</div>
                <input type="range" name="chatLuong" min="0" step="1" max="10" value="8">                                               
            </div>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Vị trí</div>
                <div id="viTri" class="t-danhgia-tieuchi-header-score pull-right">8.0</div>
                <input type="range" name="viTri" min="0" step="1" max="10" value="8">                                               
            </div>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Không gian</div>
                <div id="khongGian" class="t-danhgia-tieuchi-header-score pull-right">8.0</div>
                <input type="range" name="khongGian" min="0" step="1" max="10" value="8">                                               
            </div>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Giá cả</div>
                <div id="giaCaDGDD" class="t-danhgia-tieuchi-header-score pull-right">8.0</div>
                <input type="range" name="giaCaDGDD" min="0" step="1" max="10" value="8">                                               
            </div>
        </div>
    </div>
    <div class="panel-footer" style="overflow: auto;">
        <button type="submit" name="submit" class="btn btn-default t-btn-default pull-right" style="width: 120px;">Đánh giá</button>
    </div>
    <?php echo form_close(); ?>
</div>