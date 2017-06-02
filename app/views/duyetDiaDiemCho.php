<div class="panel panel-default">
     <p class="panel-heading t-panel-header">Duyệt các địa điểm chờ</p>
	<?php foreach ($cacDiaDiemCho as $diaDiemCho) : ?>
    <!--Tạo địa điểm chờ 1-->
    <div class="t-body row">
    	<div class="t-diadiemcho" style="box-shadow: 2px 2px #dddddd; margin-bottom:7px; padding:10px">
    		<div class="col-md-8">
    			<div class="row" style="height:140px">
    				<div  style="width:140px; float:left">
    					<img src="<?php echo base_url('assets/images/db/'.$diaDiemCho['AnhDaiDienDD'] ); ?>" class="t-imgdiadiemcho">
    				</div>
    				<div style="float:lefft;padding-left:140px; height:100%">
    					<div class="t-infodiadiemcho" >
    						<div><b><?php echo $diaDiemCho['TenDiaDiem'] ; ?></b></div>
    						<div><?php echo $diaDiemCho['MoTaDD'] ; ?></div>
    						<div><?php echo $diaDiemCho['DiaChi'] ; ?></div>
    						<div>
								Mở cửa từ <?php echo date('H:i',strtotime($diaDiemCho['GioMoCua'])).' - '.date('H:i',strtotime($diaDiemCho['GioDongCua'])); ?>
							</div>
    						<div>15.000đ - 30.000đ</div>
    						<div class="t-telephone"><?php echo $diaDiemCho['SoDT'] ; ?></div>
    					</div>
    				</div>
    			</div>
    			<div class="row" >
					<?php $thongTinNguoiDung = $this->NguoiDung_model->select($diaDiemCho['TenDangNhap']);?>
    				<img src="<?php echo base_url('assets/images/db/'.$thongTinNguoiDung['AnhDaiDien'] ); ?>" class="t-user">
    				<div style="float:left; padding-top:17px"><b class="t-username"><?php echo $thongTinNguoiDung['TenNguoiDung'] ; ?> </b> đã tạo địa điểm này.</div>
    			</div>
    		</div>
            <!--Button-->
    		<div class="col-md-4">
    			<div class="t-btndiadiemcho">
    				<button type="submit" class="btn btn-default t-btn-default" id="submit" name="submit">Duyệt ngay</button>
    				<a href="#" class="btn btn-default t-btnxoa">Xóa địa điểm</a>
    			</div>
    		</div>
    	</div>
    </div>
    <!--Tạo địa điểm chờ 1-->
	<?php endforeach; ?>
</div>
<!-- nội dung -->