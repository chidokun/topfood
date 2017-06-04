<script src="<?php echo base_url('assets/js/monAnInfo_js.js'); ?>"></script>
<div class="col-md-12 t-diadiem-info ">
	<div class="col-md-3">
		<img class="t-diadiem-img-avatar" src="<?php echo base_url('/assets/images/db/'.$diaDiem_data['AnhDaiDienDD']); ?>">
	</div>
	<div class="col-md-9 t-divanhbia-monan">
		<div class="t-divavatarmonan pull-left">
      		<img src="<?php echo base_url('assets/images/db/'.$monAn['AnhDaiDienMA']); ?>" class="t-imgavatarmonan">
    	</div>
    	<div class="t-detailmonan pull-left">
			<div class="t-diadiem-name"><?php echo $monAn['TenMonAn'];?></div>
			<div>Tại <b><?php echo $diaDiem_data['TenDiaDiem'];?></b></div>
			<div><em><?php echo $monAn['MoTaMA'];?></em></div>
			<div><span class="glyphicon glyphicon-tags"></span> <?php echo $monAn['GiaCaMA'];?></div>
		</div>
		<div class="t-monan-avescore pull-right"><?php echo number_format($monAn['DiemTrungBinhMA'], 1); ?></div>
		<div class="btn-group" style="position: absolute; bottom: 10px; right: 10px;">
			<a href="<?php echo base_url('monAn/cacDanhGia/'.$monAn['MaMonAn']);?>" class="btn t-btn-default t-btn-default-transparent" title="Xem các đánh giá"><span class="glyphicon glyphicon-menu-hamburger"></span> Đánh giá</a>
			<a href="<?php echo base_url('monAn/hinhAnh/'.$monAn['MaMonAn']);?>" class="btn t-btn-default t-btn-default-transparent" title="Xem danh mục hình ảnh"><span class="glyphicon glyphicon-picture"></span> Hình ảnh</a>
			<?php if (($this->session->userdata('logged_in')) && ($this->session->userdata('tenDangNhap') == $diaDiem_data['TenDangNhap'] || $this->session->userdata('maQH') == 0)): ?>
				<a href="<?php echo base_url('monAn/suaMonAn/'.$monAn['MaMonAn']);?>" class="btn t-btn-default t-btn-default-transparent" title="Thay đổi thông tin"><span class="glyphicon glyphicon-edit"></span></a>
				<a id="deleteFood" href="<?php echo base_url('monAn/deleteMonAn/'.$monAn['MaMonAn']);?>" class="btn t-btn-default t-btn-default-transparent" title="Xóa món ăn"><span class="glyphicon glyphicon-remove"></span></a>
			<?php endif; ?>
		</div>
	</div>
</div>
