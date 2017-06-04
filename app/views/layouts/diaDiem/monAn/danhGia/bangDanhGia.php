<script src="<?php echo base_url('assets/js/bangDanhGia_js.js'); ?>"></script>
<div class="panel panel-default">
  <div class="panel-heading t-panel-header">Bảng đánh giá tiêu chí</div>
  <div class="panel-body">
    <?php if (($this->session->userdata('logged_in')) && ($this->session->userdata('tenDangNhap') == $danhGia['TenDangNhap'] || $this->session->userdata('maQH') == 0)): ?>
    <div class="btn-group btn-group-justified">
            <a href="<?php echo base_url('monAn/suaDanhGia/'.$danhGia['MaDGMA']); ?>" class="btn btn-default t-btn-default">Sửa đánh giá</a>
            <a href="<?php echo base_url('monAn/deleteDanhGia/'.$danhGia['MaDGMA']); ?>" id="deleteReview" class="btn btn-default t-btn-default">Xóa đánh giá</a>
    </div>
    <?php endif; ?>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Hương vị</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['HuongVi'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $danhGia['HuongVi'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Trình bày</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['CachTrinhBay'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $danhGia['CachTrinhBay'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Giá cả</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['GiaCaDGMA'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $danhGia['GiaCaDGMA'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Độ hài lòng</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['DoHaiLong'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $danhGia['DoHaiLong'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div align="center">
        <span  class="t-danhgia-diemtb"><?php echo number_format($danhGia['DiemTrungBinhDGMA'], 1); ?></span>điểm
    </div>
  </div>
</div>