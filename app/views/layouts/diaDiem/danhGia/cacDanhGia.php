<div>
	<?php if (count($cacDanhGia) == 0) : ?>
			<p class='alert alert-dismissable alert-success'>Chưa có đánh giá nào.</p>
	<?php else: ?>
	<?php foreach ($cacDanhGia as $danhGia) : ?>
        <div class="panel panel-default">
			<div class="panel-heading media" style="overflow: auto;">
				<div class="t-danhgia-item-avatar media-left">
					<img src=<?php echo base_url('assets/images/db/'.($this->NguoiDung_model->select($danhGia['TenDangNhap']))['AnhDaiDien']); ?>>
				</div>      
				<div class="t-danhgia-item-heading media-body">
					<div class="t-danhgia-username">
						<?php echo ($this->NguoiDung_model->select($danhGia['TenDangNhap']))['TenNguoiDung']; ?>
					</div>
					<div class="t-danhgia-date">
						<?php echo date('H:i d/m/Y', strtotime($danhGia['NgayTaoDGDD'])); ?>
					</div>      
				</div>
				<div class="media-right">
					<div class="t-danhgia-diem">
						<div><?php echo number_format($danhGia['DiemTrungBinhDGDD'], 1); ?></div>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="t-danhgia-item-content-heading"><?php echo $danhGia['TieuDeDGDD'];?></div>
				<div class="t-danhgia-item-content-body">
					<?php echo $danhGia['BaiNhanXetDGDD']; ?>
				</div>
			</div>
			<div class="panel-footer t-like-panel">
				<div class="t-like-count pull-left">
					<img src=<?php echo base_url('assets/images/app/like_num.png'); ?>> <?php echo $danhGia['TongLuotThichDGDD'];?> lượt thích
				</div>
				<div class="t-like-count pull-left">
					<img src=<?php echo base_url('assets/images/app/comment.png'); ?>> <?php echo $this->DanhGiaDiaDiem_model->selectTongBinhLuanDanhGia($danhGia['MaDGDD']); ?> bình luận
				</div>
				<a href="<?php echo base_url(uri_string().'/'.$danhGia['MaDGDD']); ?>" class="btn btn-default btn-xs pull-right">Xem đánh giá</a>
			</div>
		</div>
    <?php endforeach; ?>
	<?php endif; ?>
</div>
