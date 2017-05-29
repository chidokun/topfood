<div class="col-md-12 t-diadiem-wrapper">
	<?php $this->load->view($monAn_info); ?>
	<div class="col-md-3 t-diadiem-menu">
		<ul class="nav">
			<li class="active"><a href="#">Đánh giá<span class="glyphicon glyphicon-menu-right pull-right" style="color: #f59f08;"></span></a></li>
			<li><a href="#">Hình ảnh</a></li>
			<li><a href="#">Thực đơn</a></li>
			<li><a href="#">Thông tin chi tiết</a></li>
		</ul>
	</div>
	<div class="col-md-9 t-diadiem-content">
		<?php $this->load->view($main_monAn_vietDanhGiaMonAn); ?>
	</div>
</div>