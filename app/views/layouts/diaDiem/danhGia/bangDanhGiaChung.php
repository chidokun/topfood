<div class="panel panel-default">
  <div class="panel-heading t-panel-header">Bảng đánh giá chung</div>
  <div class="panel-body">
    <?php if ($this->session->userdata('logged_in') && ($diaDiem_data['TrangThai'] == 1 || $this->session->userdata('maQH') == 0)): ?>
    <div class="btn-group btn-group-justified">
        <a href="<?php echo base_url('diaDiem/vietDanhGia/'.$diaDiem_data['MaDiaDiem']); ?>" class="btn btn-default t-btn-default">Viết đánh giá ngay...</a>
    </div>
    <?php endif; ?>
    <div class="t-danhgia-count">
        <div><b><?php echo $tongDanhGia; ?></b> đánh giá.</div>
        <div><b><?php echo $tongBinhLuan; ?></b> bình luận.</div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Phục vụ</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($bangDanhGia_data['PhucVu'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $bangDanhGia_data['PhucVu'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Chất lượng</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($bangDanhGia_data['ChatLuong'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $bangDanhGia_data['ChatLuong'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Vị trí</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($bangDanhGia_data['ViTri'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $bangDanhGia_data['ViTri'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Không gian</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($bangDanhGia_data['KhongGian'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $bangDanhGia_data['KhongGian'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div class="t-danhgia-tieuchi">
        <div class="t-danhgia-tieuchi-header">
            <div class="pull-left">Giá cả</div>
            <div class="t-danhgia-tieuchi-header-score pull-right"><?php echo number_format($bangDanhGia_data['GiaCaDGDD'], 1); ?></div>
        </div>
        <div class="progress t-danhgia-progress">
            <div class="progress-bar t-danhgia-progressbar" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $bangDanhGia_data['GiaCaDGDD'] * 10; ?>%">
            </div>
        </div>
    </div>
    <div align="center">
        <span  class="t-danhgia-diemtb"><?php echo number_format($bangDanhGia_data['DiemTrungBinhDGDD'], 1); ?></span>điểm
    </div>
  </div>
</div>