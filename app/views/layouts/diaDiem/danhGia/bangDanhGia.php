<script src="<?php echo base_url('assets/js/bangDanhGia_js.js'); ?>"></script>
<div class="panel panel-default">
  <div class="panel-heading t-panel-header">Bảng đánh giá tiêu chí</div>
  <div class="panel-body">
    <?php if (($this->session->userdata('logged_in')) && ($this->session->userdata('tenDangNhap') == $danhGia['TenDangNhap'] || $this->session->userdata('maQH') == 0)): ?>
    <div class="btn-group btn-group-justified">
            <a href="<?php echo base_url('diaDiem/suaDanhGia/'.$danhGia['MaDGDD']); ?>" class="btn btn-default t-btn-default">Sửa đánh giá</a>
            <a href="<?php echo base_url('diaDiem/deleteDanhGia/'.$danhGia['MaDGDD']); ?>" id="deleteReview" class="btn btn-default t-btn-default">Xóa đánh giá</a>
    </div>
    <?php endif; ?>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Phục vụ</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['PhucVu'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $danhGia['PhucVu'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Chất lượng</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['ChatLuong'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $danhGia['ChatLuong'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Vị trí</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['ViTri'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $danhGia['ViTri'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Không gian</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['KhongGian'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $danhGia['KhongGian'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Giá cả</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($danhGia['GiaCaDGDD'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $danhGia['GiaCaDGDD'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div align="center">
        <span  class="t-danhgia-diemtb"><?php echo number_format($danhGia['DiemTrungBinhDGDD'], 1); ?></span>điểm
    </div>
  </div>
</div>