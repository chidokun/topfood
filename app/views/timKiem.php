
<div class="panel panel-default">
	<div class="panel-heading t-panel-header">Kết quả tìm kiếm cho <?php echo $noiDung ; ?></div>
	<div class="panel-body">
		<?php if (count($ketQua)==0): ?>
			<div ><?php echo 'Không có kết quả' ; ?></div>
		<?php else: ?>
			<?php if ($_POST["timkiem"]=='place'): ?>
				<?php foreach ($ketQua as  $kq) : ?>
					<div class="t-diadiemcho" style=" padding:10px" >
						<div  style="width:140px; float:left; height:140px">
							<img src="<?php echo base_url('assets/images/db/'.$kq['AnhDaiDienDD'] ); ?>" class="t-imgdiadiemcho">
						</div>
						<div style="float:left; height:100%">
							<div class="t-infodiadiemcho" >
								<div><label style="font-size:20px"><?php echo $kq['TenDiaDiem'] ; ?></label></div>
								<div><?php echo $kq['MoTaDD'] ; ?></div>
								<div><?php echo $kq['DiaChi'] ; ?></div>
								<div>
									Mở cửa từ <?php echo date('H:i',strtotime($kq['GioMoCua'])).' - '.date('H:i',strtotime($kq['GioDongCua'])); ?>
								</div>
								<div>15.000đ - 30.000đ</div>
								<div class="t-telephone"><?php echo $kq['SoDT'] ; ?></div>
							</div>
						</div>
						<a href="<?php echo base_url('diaDiem/info/'.$kq['MaDiaDiem']);?>" class="btn btn-default btn-xs pull-right" style="position: absolute; bottom:10px; right:10px" >Xem thêm</a>
					</div>
				<?php endforeach; ?>

			<?php elseif  ($_POST["timkiem"]=='user'): ?>
				<?php foreach ($ketQua as  $kq) : ?>
					<div class="t-diadiemcho" style=" padding:10px" >
						<div  style="width:140px; float:left; height:140px">
							<img src="<?php echo base_url('assets/images/db/'.$kq['AnhDaiDien'] ); ?>" class="t-imgdiadiemcho" >
						</div>
						<div style="float:left; height:100%">
							<div class="t-infodiadiemcho" >
								<div><label style="font-size:20px"><?php echo $kq['TenNguoiDung'] ; ?></label></div>
								<div><?php echo $kq['TenDangNhap'] ; ?></div>
								<div><?php echo $kq['GioiTinh'] ; ?></div>
								<div ><?php echo $kq['GioiThieuBanThan'] ; ?></div>
							</div>
						</div>
						<a href="<?php echo base_url('trangCaNhan/info/'.$kq['TenDangNhap']);?>" class="btn btn-default btn-xs pull-right" style="position: absolute; bottom:10px; right:10px" >Xem thêm</a>
					</div>
				<?php endforeach; ?>

			<?php elseif  ($_POST["timkiem"]=='food'): ?>
				<?php foreach ($ketQua as  $kq) : ?>
					<div class="t-diadiemcho" style=" padding:10px" >
						<div  style="width:140px; float:left; height:140px">
							<img src="<?php echo base_url('assets/images/db/'.$kq['AnhDaiDienMA'] ); ?>" class="t-imgdiadiemcho" >
						</div>
						<div style="float:left; height:100%">
							<div class="t-infodiadiemcho" >
								<div><label style="font-size:20px"><?php echo $kq['TenMonAn'] ; ?></label></div>
								<div><span class="glyphicon glyphicon-pencil"> </span> <?php echo $kq['MoTaMA'] ; ?></div>
								<div><span class="glyphicon glyphicon-tags"> </span> <?php echo $kq['GiaCaMA'] ; ?></div>
								<div>Tại <b><?php echo $this->DiaDiem_model->select($kq['MaDiaDiem'])['TenDiaDiem']; ?></b></div>
							</div>
						</div>
						<a href="<?php echo base_url('monAn/cacDanhGia/'.$kq['MaMonAn']);?>" class="btn btn-default btn-xs pull-right" style="position: absolute; bottom:10px; right:10px" >Xem thêm</a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
	
