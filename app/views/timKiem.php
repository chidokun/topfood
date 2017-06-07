
<div class="panel panel-default">
	<div class="panel-heading t-panel-header">Kết quả tìm kiếm cho "<?php echo $noiDung ; ?>"</div>
	<div class="panel-body">
		<?php if (count($ketQua)==0): ?>
			<div ><?php echo 'Không có kết quả' ; ?></div>
		<?php else: ?>
			<?php if ($_GET["timkiem"]=='place'): ?>
				<?php foreach ($ketQua as  $kq) : ?>
					<div class="t-diadiemcho">
						<div style="width:140px; float:left; height:140px">
						<a href="<?php echo base_url('diaDiem/info/'.$kq['MaDiaDiem']);?>">
							<img src="<?php echo $kq['AnhDaiDienDD'] ? base_url('assets/images/db/'.$kq['AnhDaiDienDD']) : base_url('assets/images/app/place.png'); ?>" class="t-imgdiadiemcho">
						</a>
						</div>
						<div style="float:left; height:100%">
							<div class="t-infodiadiemcho" >
								<div><a href="<?php echo base_url('diaDiem/info/'.$kq['MaDiaDiem']);?>" style="font-size: 20px; font-weight: bold;"><?php echo $kq['TenDiaDiem'] ; ?></a></div>
								<div><i><?php echo $kq['MoTaDD'] ; ?></i></div>
								<div><?php echo $kq['DiaChi'] ; ?></div>
								<div>
									Mở cửa từ <b><?php echo date('H:i',strtotime($kq['GioMoCua'])).' - '.date('H:i',strtotime($kq['GioDongCua'])); ?></b>
								</div>
								<?php $gia = $this->DiaDiem_model->selectGia($kq['MaDiaDiem']); ?>
								<div style="color: #890606; font-weight: bold;"><?php echo number_format($gia['Min'],0,',','.').'đ';?> - <?php echo number_format($gia['Max'],0,',','.').'đ';?></div>
								<div class="t-telephone"><?php echo $kq['SoDT'] ; ?></div>
							</div>
						</div>
						<a href="<?php echo base_url('diaDiem/info/'.$kq['MaDiaDiem']);?>" class="btn btn-default btn-xs pull-right" style="position: absolute; bottom:10px; right:10px" >Xem thêm</a>
					</div>
				<?php endforeach; ?>

			<?php elseif  ($_GET["timkiem"]=='user'): ?>
				<?php foreach ($ketQua as  $kq) : ?>
					<div class="t-diadiemcho">
						<div  style="width:140px; float:left; height:140px">
							<img src="<?php echo $kq['AnhDaiDien'] ? base_url('assets/images/db/'.$kq['AnhDaiDien']) : base_url('assets/images/app/user.jpg'); ?>" class="t-imgdiadiemcho" >
						</div>
						<div style="float:left; height:100%">
							<div class="t-infodiadiemcho" >
								<div><a href="<?php echo base_url('trangCaNhan/danhGia/'.$kq['TenDangNhap']);?>" style="font-size:20px; font-weight:bold;"><?php echo $kq['TenNguoiDung'] ; ?></a></div>
								<div><b>@<?php echo $kq['TenDangNhap'] ; ?></b></div>
								<div><i><?php echo $kq['GioiTinh'] ; ?></i></div>
								<div ><?php echo $kq['GioiThieuBanThan'] ; ?></div>
							</div>
						</div>
						<a href="<?php echo base_url('trangCaNhan/danhGia/'.$kq['TenDangNhap']);?>" class="btn btn-default btn-xs pull-right" style="position: absolute; bottom:10px; right:10px" >Xem thêm</a>
					</div>
				<?php endforeach; ?>

			<?php elseif  ($_GET["timkiem"]=='food'): ?>
				<?php foreach ($ketQua as  $kq) : ?>
					<div class="t-diadiemcho">
						<div  style="width:140px; float:left; height:140px">
							<img src="<?php echo $kq['AnhDaiDienMA'] ? base_url('assets/images/db/'.$kq['AnhDaiDienMA']) : base_url('assets/images/app/food.png'); ?>" class="t-imgdiadiemcho" >
						</div>
						<div style="float:left; height:100%">
							<div class="t-infodiadiemcho" >
								<div><a href="<?php echo base_url('monAn/cacDanhGia/'.$kq['MaMonAn']);?>" style="font-size:20px; font-weight: bold;"><?php echo $kq['TenMonAn'] ; ?></a></div>
								<div><span class="glyphicon glyphicon-pencil"></span> <?php echo $kq['MoTaMA'] ; ?></div>
								<div style="color: #890606;"><span class="glyphicon glyphicon-tags"></span> <b><?php echo number_format($kq['GiaCaMA'],0,',','.').'đ';?></b></div>
								<div>Tại <b><a href="<?php echo base_url('diaDiem/cacDanhGia/'.$kq['MaDiaDiem']);?>"><?php echo $this->DiaDiem_model->select($kq['MaDiaDiem'])['TenDiaDiem']; ?></a></b></div>
							</div>
						</div>
						<a href="<?php echo base_url('monAn/cacDanhGia/'.$kq['MaMonAn']);?>" class="btn btn-default btn-xs pull-right" style="position: absolute; bottom:10px; right:10px" >Xem thêm</a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
	
