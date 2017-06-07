<div>
	<?php if ($this->session->flashdata('food_updated_successful')): ?> 
            <p class='alert alert-dismissable alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                <?php echo $this->session->flashdata('food_updated_successful'); ?>
            </p>
	<?php elseif ($this->session->flashdata('food_updated_failed')): ?>
		<p class='alert alert-dismissable alert-danger'>";
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>";
			<?php echo $this->session->flashdata('food_updated_failed'); ?>
		</p>
	<?php endif; ?>

	<?php if ($this->session->flashdata('food_deleted_failed')): ?>
			<p class='alert alert-dismissable alert-danger'>";
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>";
			    <?php echo $this->session->flashdata('food_deleted_failed'); ?>
			</p>
	<?php endif; ?>

	<?php if (count($cacDanhGia) == 0) : ?>
			<p class='alert alert-dismissable alert-success'>Chưa có đánh giá nào.</p>
	<?php else: ?>
	<?php if ($this->session->flashdata('review_deleted_successful')): ?> 
            <p class='alert alert-dismissable alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                <?php echo $this->session->flashdata('review_deleted_successful'); ?>
            </p>
	<?php endif; ?>
	<?php foreach ($cacDanhGia as $danhGia) : ?>
        <div class="panel panel-default">
			<div class="panel-heading media" style="overflow: auto;">
				<div class="t-danhgia-item-avatar media-left">
					<?php $img = $this->NguoiDung_model->select($danhGia['TenDangNhap'])['AnhDaiDien']; ?>	
					<a href="<?php echo base_url('trangCaNhan/danhGia/'.$danhGia['TenDangNhap']); ?>">
						<img src="<?php echo $img ? base_url('assets/images/db/'.$img) : base_url('assets/images/app/user.jpg') ; ?>">
					</a>				
				</div>      
				<div class="t-danhgia-item-heading media-body">
					<div class="t-danhgia-username">
					<a href="<?php echo base_url('trangCaNhan/danhGia/'.$danhGia['TenDangNhap']); ?>">
						<?php echo ($this->NguoiDung_model->select($danhGia['TenDangNhap']))['TenNguoiDung']; ?>
					</a>
					</div>
					<div class="t-danhgia-date">
						<?php echo date('H:i d/m/Y', strtotime($danhGia['NgayTaoDGMA'])); ?>
					</div>      
				</div>
				<div class="media-right">
					<div class="t-danhgia-diem">
						<div><?php echo number_format($danhGia['DiemTrungBinhDGMA'], 1); ?></div>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="t-danhgia-item-content-heading"><?php echo $danhGia['TieuDeDGMA'];?></div>
				<div class="t-danhgia-item-content-body">
					<?php echo $danhGia['BaiNhanXetDGMA']; ?>
				</div>
			</div>
			<div class="panel-footer t-like-panel">
				<div class="t-like-count pull-left">
					<img src=<?php echo base_url('assets/images/app/like_num.png'); ?>> <?php echo $danhGia['TongLuotThichDGMA'];?> lượt thích
				</div>
				<div class="t-like-count pull-left">
					<img src=<?php echo base_url('assets/images/app/comment.png'); ?>> <?php echo $this->DanhGiaMonAn_model->selectTongBinhLuanDanhGia($danhGia['MaDGMA']); ?> bình luận
				</div>
				<a href="<?php echo base_url(uri_string().'/'.$danhGia['MaDGMA']); ?>" class="btn btn-default btn-xs pull-right">Xem đánh giá</a>
			</div>
		</div>
    <?php endforeach; ?>
	<?php endif; ?>
</div>
