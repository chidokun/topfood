<div class="panel panel-default">
  <div class="panel-heading t-panel-header">Bảng đánh giá chung</div>
  <div class="panel-body">
    <?php if ($this->session->userdata('logged_in')): ?>
    <div class="btn-group btn-group-justified">
        <a href="<?php echo base_url('monAn/vietDanhGia/'.$monAn['MaMonAn']); ?>" class="btn btn-default t-btn-default">Viết đánh giá ngay...</a>
    </div>
    <?php endif; ?>
    <div class="t-danhgia-count">
        <div><b><?php echo $tongDanhGia; ?></b> đánh giá.</div>
        <div><b><?php echo $tongBinhLuan; ?></b> bình luận.</div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Hương vị</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($bangDanhGia_data['HuongVi'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $bangDanhGia_data['HuongVi'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Trình bày</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($bangDanhGia_data['CachTrinhBay'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $bangDanhGia_data['CachTrinhBay'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Giá cả</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($bangDanhGia_data['GiaCaDGMA'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $bangDanhGia_data['GiaCaDGMA'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Độ hài lòng</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($bangDanhGia_data['DoHaiLong'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $bangDanhGia_data['DoHaiLong'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div align="center">
        <span  class="t-danhgia-diemtb"><?php echo number_format($bangDanhGia_data['DiemTrungBinhDGMA'], 1); ?></span>điểm
    </div>
  </div>
</div>