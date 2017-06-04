<script src=<?php echo base_url('assets/js/vietDanhGiaMonAn_js.js'); ?>></script>
<div class="panel panel-default">
    <div class="panel-heading t-panel-header">Sửa đánh giá món ăn</div>
    <?php echo form_open('monAn/updateDanhGia/'.$danhGia['MaDGMA']); ?>
    <div class="panel-body">
        <?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
        <div class="form-group">
            <label for="usr">Tiêu đề</label>
            <input type="text" class="form-control" id="tieuDeDGMA" name="tieuDeDGMA" placeholder="Tiêu đề đánh giá..." value="<?php echo $danhGia['TieuDeDGMA']; ?>">
        </div>
        <div class="form-group">
            <label for="usr">Nhận xét</label>
            <textarea class="form-control" rows="7" id="baiNhanXetDGMA" name="baiNhanXetDGMA" placeholder="Viết vài dòng nhận xét..."><?php echo $danhGia['BaiNhanXetDGMA']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Đánh giá các tiêu chí</label>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Hương vị</div>
                <div id="huongVi" class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['HuongVi'], 1); ?></div>
                <input type="range" name="huongVi" min="0" step="1" max="10" value="<?php echo $danhGia['HuongVi']; ?>">                                               
            </div>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Trình bày</div>
                <div id="cachTrinhBay" class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['CachTrinhBay'], 1); ?></div>
                <input type="range" name="cachTrinhBay" min="0" step="1" max="10" value="<?php echo $danhGia['CachTrinhBay']; ?>">                                               
            </div>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Giá cả</div>
                <div id="giaCaDGMA" class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['GiaCaDGMA'], 1); ?></div>
                <input type="range" name="giaCaDGMA" min="0" step="1" max="10" value="<?php echo $danhGia['GiaCaDGMA']; ?>">                                               
            </div>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Độ hài lòng</div>
                <div id="doHaiLong" class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['DoHaiLong'], 1); ?></div>
                <input type="range" name="doHaiLong" min="0" step="1" max="10" value="<?php echo $danhGia['DoHaiLong']; ?>">                                               
            </div>

        </div>
    </div>
    <div class="panel-footer" style="overflow: auto;">
        <button type="submit" name="submit" class="btn btn-default t-btn-default pull-right" style="width: 120px;">Lưu đánh giá</button>
    </div>
    <?php echo form_close(); ?>
</div>