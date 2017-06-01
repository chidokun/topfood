<script src=<?php echo base_url('assets/js/vietDanhGiaDiaDiem_js.js'); ?>></script>
<div class="panel panel-default">
    <div class="panel-heading t-panel-header">Sửa đánh giá</div>
    <?php echo form_open('diaDiem/updateDanhGia/'.$danhGia['MaDGDD']); ?>
    <div class="panel-body">
        <?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
        <div class="form-group">
            <label for="usr">Tiêu đề</label>
            <input type="text" class="form-control" id="tieuDeDGDD" name="tieuDeDGDD" placeholder="Tiêu đề đánh giá..." value="<?php echo $danhGia['TieuDeDGDD']; ?>">
        </div>
        <div class="form-group">
            <label for="usr">Nhận xét</label>
            <textarea class="form-control" rows="7" id="baiNhanXetDGDD" name="baiNhanXetDGDD" placeholder="Viết vài dòng nhận xét..."><?php echo $danhGia['BaiNhanXetDGDD']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Đánh giá các tiêu chí</label>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Phục vụ</div>
                <div id="phucVu" class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['PhucVu'], 1); ?></div>
                <input type="range" name="phucVu" min="0" step="1" max="10" value="<?php echo $danhGia['PhucVu']; ?>">                                               
            </div>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Chất lượng</div>
                <div id="chatLuong" class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['ChatLuong'], 1); ?></div>
                <input type="range" name="chatLuong" min="0" step="1" max="10" value="<?php echo $danhGia['ChatLuong']; ?>">                                               
            </div>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Vị trí</div>
                <div id="viTri" class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['ViTri'], 1); ?></div>
                <input type="range" name="viTri" min="0" step="1" max="10" value="<?php echo $danhGia['ViTri']; ?>">                                               
            </div>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Không gian</div>
                <div id="khongGian" class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['KhongGian'], 1); ?></div>
                <input type="range" name="khongGian" min="0" step="1" max="10" value="<?php echo $danhGia['KhongGian']; ?>">                                               
            </div>

            <div class="t-danhgia-tieuchi">
                <div class="t-danhgia-tieuchi-header pull-left">Giá cả</div>
                <div id="giaCaDGDD" class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['GiaCaDGDD'], 1); ?></div>
                <input type="range" name="giaCaDGDD" min="0" step="1" max="10" value="<?php echo $danhGia['GiaCaDGDD']; ?>">                                               
            </div>
        </div>
    </div>
    <div class="panel-footer" style="overflow: auto;">
        <div class="pull-right">
            <button type="submit" name="submit" class="btn btn-default t-btn-default" style="width: 120px;">Lưu đánh giá</button>
            <a href="<?php echo base_url('diaDiem/cacDanhGia/'.$danhGia['MaDiaDiem'].'/'.$danhGia['MaDGDD']);?>" class="btn btn-default t-btn" style="width: 120px;">Hủy bỏ</a>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>