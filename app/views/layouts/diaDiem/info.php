<div class="col-md-12 t-diadiem-info">
	<div class="col-md-3">
		<img class="t-diadiem-img-avatar" src="<?php echo base_url('/assets/images/db/'.$diaDiem_data['AnhDaiDienDD']); ?>">
	</div>
	<div class="col-md-9 t-diadiem-info-panel">
		<div class="pull-left">
			<div class="t-diadiem-name"><?php echo $diaDiem_data['TenDiaDiem']; ?></div>
			<div><em><?php echo $diaDiem_data['MoTaDD']; ?></em></div>
			<div><span class="glyphicon glyphicon-home"></span> <?php echo $diaDiem_data['DiaChi']; ?></div>
			<div>
				<span class="glyphicon glyphicon-time"></span>
				<?php if (time() < strtotime($diaDiem_data['GioMoCua']) || strtotime($diaDiem_data['GioDongCua']) > time()): ?>
					<span style="color:#C43414;font-weight: bold;"> Đã đóng cửa </span>
				<?php else:	?>
					<span style="color:#007d03;font-weight: bold;"> Đang mở cửa </span>
				<?php endif; ?>
				<?php echo date('H:i',strtotime($diaDiem_data['GioMoCua'])).' - '.date('H:i',strtotime($diaDiem_data['GioDongCua'])); ?>
			</div>
			<?php $gia = $this->DiaDiem_model->selectGia($diaDiem_data['MaDiaDiem']); ?>
			<div><span class="glyphicon glyphicon-tags"></span> Từ <?php echo number_format($gia['Min'],0,',','.').'đ';?> - <?php echo number_format($gia['Max'],0,',','.').'đ';?></div>
		</div>
		<div class="pull-right">
			<div class="t-diadiem-avescore"><?php echo number_format($diaDiem_data['DiemTrungBinhDD'], 1); ?></div>
			<div class="t-diadiem-avescore-description">Điểm trung bình</div>
		</div>
	</div>
</div>
