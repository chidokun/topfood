<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<div class="panel panel-default">
     	<p class="panel-heading t-panel-header"><b>Kết quả tìm kiếm cho <span><?php echo $noiDung ; ?></span></b></p>
		 <?php if ($_POST["timkiem"]=='place'): ?>
		 <?php foreach ($ketQua as  $kq) : ?>
			<div >
				<div class="t-diadiemcho" style=" padding:10px" >
					<div  style="width:140px; float:left; height:140px">
						<img src="<?php echo base_url('assets/images/db/'.$kq['AnhDaiDienDD'] ); ?>" class="t-imgdiadiemcho">
					</div>
					<div style="float:left; height:100%">
						<div class="t-infodiadiemcho" >
							<div><b><?php echo $kq['TenDiaDiem'] ; ?></b></div>
							<div><?php echo $kq['MoTaDD'] ; ?></div>
							<div><?php echo $kq['DiaChi'] ; ?></div>
							<div>
								Mở cửa từ <?php echo date('H:i',strtotime($kq['GioMoCua'])).' - '.date('H:i',strtotime($kq['GioDongCua'])); ?>
							</div>
							<div>15.000đ - 30.000đ</div>
							<div class="t-telephone"><?php echo $kq['SoDT'] ; ?></div>
						</div>
					</div>
					<a href="#" class="btn btn-default btn-xs pull-right" style="position: absolute; bottom:10px; right:10px" >Xem thêm</a>
				</div>
			</div>
		<?php endforeach; ?>

		<?php elseif  ($_POST["timkiem"]=='user'): ?>
		<?php foreach ($ketQua as  $kq) : ?>
			<div >
				<div class="t-diadiemcho" style=" padding:10px" >
					<div  style="width:140px; float:left; height:140px">
						<img src="<?php echo base_url('assets/images/db/'.$kq['AnhDaiDien'] ); ?>" class="t-imgdiadiemcho" >
					</div>
					<div style="float:left; height:100%">
						<div class="t-infodiadiemcho" >
							<div><b><?php echo $kq['TenNguoiDung'] ; ?></b></div>
							<div><?php echo $kq['TenDangNhap'] ; ?></div>
							<div><?php echo $kq['GioiTinh'] ; ?></div>
							<div ><?php echo $kq['GioiThieuBanThan'] ; ?></div>
						</div>
					</div>
					<a href="#" class="btn btn-default btn-xs pull-right" style="position: absolute; bottom:10px; right:10px" >Xem thêm</a>
				</div>
			</div>
		<?php endforeach; ?>

		<?php elseif  ($_POST["timkiem"]=='food'): ?>
		<?php foreach ($ketQua as  $kq) : ?>
			<div >
				<div class="t-diadiemcho" style=" padding:10px" >
					<div  style="width:140px; float:left; height:140px">
						<img src="<?php echo base_url('assets/images/db/'.$kq['AnhDaiDienMA'] ); ?>" class="t-imgdiadiemcho" >
					</div>
					<div style="float:left; height:100%">
						<div class="t-infodiadiemcho" >
							<div><b><?php echo $kq['TenMonAn'] ; ?></b></div>
							<div><?php echo $kq['MoTaMonAn'] ; ?></div>
							<div><?php echo $kq['GiaCaMA'] ; ?></div>
						</div>
					</div>
					<a href="#" class="btn btn-default btn-xs pull-right" style="position: absolute; bottom:10px; right:10px" >Xem thêm</a>
				</div>
			</div>
		<?php endforeach; ?>
		<?php endif; ?>
    </div>
		
 