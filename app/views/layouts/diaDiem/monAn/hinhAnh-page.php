<script src="<?php echo base_url('assets/js/hinhAnhMonAn_js.js'); ?>"></script>
<div class="panel panel-default">
    <div class="panel-heading t-panel-header">
	    Hình ảnh món ăn
    </div>
	<?php if (($this->session->userdata('logged_in')) && ($this->session->userdata('tenDangNhap') == $diaDiem_data['TenDangNhap'] || $this->session->userdata('maQH') == 0)): ?>
		<div class="panel-footer" style="overflow: auto;">
			<div class="pull-right">
				<?php echo form_open_multipart('monAn/themHinhAnh'); ?>
					<input type="text" id="maMonAn" name="maMonAn" value="<?php echo $monAn['MaMonAn']; ?>" style="display: none; ">
					<input type="file" id="hinhAnh" name="hinhAnh" style="display: none;">
					<div class="btn-group">
						<button type="button" id="chonHinhAnh" class="btn t-btn-default"><span class="glyphicon glyphicon-picture"></span> Chọn hình ảnh</button>
						<button type="submit" id="themHinhAnh" name="submit" class="btn btn-default t-btn-default">
						<span class="glyphicon glyphicon-plus"></span> Thêm hình ảnh
						</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	<?php endif; ?>

    <div class="panel-body">
		<?php if (count($listImg) == 0): ?>
				<p class='alert alert-dismissable alert-success'>Chưa có hình ảnh.</p>
			<?php else : ?>
				<div class="row">
					<?php foreach ($listImg as $img): ?>
						<div class="col-md-4" id="img_<?php echo $img['PathMA'];?>">
							<div class="thumbnail">
								<img src=<?php echo base_url('assets/images/db/'.$img['PathMA']); ?>>
								<?php if (($this->session->userdata('logged_in')) && ($this->session->userdata('tenDangNhap') == $diaDiem_data['TenDangNhap'] || $this->session->userdata('maQH') == 0)): ?>
								<div class="caption" style="overflow: auto;">
									<button type="button" class="btn btn-default btn-xs pull-right deleteImage" value="<?php echo $img['PathMA']; ?>"><span class="glyphicon glyphicon-remove"></span> Xóa</button>
								</div>
								<?php endif; ?>
							</div>
						</div> 
					<?php endforeach; ?>	
				</div>
			<?php endif; ?>	      
    </div>
</div>