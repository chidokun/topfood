<!-- Khu vực thông báo flashdata -->
<?php if ($this->session->flashdata('review_update_successful')): ?> 
    <p class='alert alert-dismissable alert-success'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
        <?php echo $this->session->flashdata('review_update_successful'); ?>
    </p>
<?php elseif ($this->session->flashdata('review_update_failed')): ?>
    <p class='alert alert-dismissable alert-danger'>";
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>";
        <?php echo $this->session->flashdata('review_update_failed'); ?>
    </p>
<?php endif; ?>

<?php if ($this->session->flashdata('review_deleted_failed')): ?> 
    <p class='alert alert-dismissable alert-danger'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
        <?php echo $this->session->flashdata('review_deleted_failed'); ?>
    </p>
<?php endif; ?>

<!-- Thêm script -->
<script src="<?php echo base_url('assets/js/danhGiaMonAn_js.js'); ?>"></script>
<!-- Lưu mã đánh giá địa điểm -->
<input type="text" id="maDGMA" value="<?php echo $danhGia['MaDGMA']; ?>" style="display:none">
<div class="panel panel-default">  
    <!-- Header -->
    <div class="panel-heading media" style="overflow: auto;">
        <!-- Avatar và thông tin người đánh giá -->
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
        <!-- Điểm trung bình đánh giá -->
        <div class="media-right">
            <div class="t-danhgia-diem">
                <div><?php echo number_format($danhGia['DiemTrungBinhDGMA'], 1); ?></div>
            </div>
        </div>
    </div>

    <!-- Nội dung đánh giá -->
    <div class="panel-body">
        <div class="t-danhgia-item-content-heading"><?php echo $danhGia['TieuDeDGMA'];?></div>
        <div class="t-danhgia-item-content-body">
            <?php echo $danhGia['BaiNhanXetDGMA']; ?>
        </div> 

        <!-- Các nút control -->  
        <div class="t-like-panel">
            <!-- Nút like, chỉ xuất hiện khi đã đăng nhập -->
            <?php if ($this->session->userdata('logged_in')): ?>
            <button class="btn btn-default btn-xs pull-left like-review" value="<?php echo $danhGia['MaDGMA']; ?>">
                <img src="<?php echo base_url('assets/images/app/like.png'); ?>"> <span id="reviewLikeBtn"><?php echo $this->DanhGiaMonAn_model->isLiked($danhGia['MaDGMA']) ? 'Bỏ thích' : 'Thích'; ?></span></button>
            <?php endif; ?>

            <!-- Bộ đếm like, cmt -->
            <div class="pull-right">
                <div class="t-like-count" style="display: inline-block;">
					<img src=<?php echo base_url('assets/images/app/like_num.png'); ?>> <span id="reviewLike"><?php echo $danhGia['TongLuotThichDGMA'];?></span>
				</div>
				<div class="t-like-count" style="display: inline-block;">
					<img src=<?php echo base_url('assets/images/app/comment.png'); ?>> <span id="reviewComment"><?php echo count($cacBinhLuan);?></span>
				</div>
            </div>
        </div>
    </div>

    <!-- Khu vực comment -->
    <div id="commentPane">
        <!-- Khi không có cmt -->
        <?php if (count($cacBinhLuan) == 0) : ?>
        <div class="panel-footer no-comment">Chưa có bình luận</div>
        <?php else: ?>

        <!-- Khi có cmt -->
        <?php foreach($cacBinhLuan as $binhLuan) : ?>

        <!-- class cmt+mãbìnhluận để định danh khu vực bình luận để xóa dễ dàng --> 
        <div class="panel-footer cmt<?php echo $binhLuan['MaBLMA']; ?>">
            <div class="media">
                <!-- Ảnh đại diện -->
                <div class="t-comment-avatar media-left">
                    <?php $user = $this->NguoiDung_model->select($binhLuan['TenDangNhap']); 
                          $img = $user['AnhDaiDien'];
                          $ten = $user['TenNguoiDung'];
                    ?>
                    <a href="<?php echo base_url('trangCaNhan/danhGia/'.$binhLuan['TenDangNhap']); ?>">
                        <img src="<?php echo $img ? base_url('assets/images/db/'.$img) : base_url('assets/images/app/user.jpg'); ?>">
                    </a>
                </div>

                <!-- Nội dung bình luận -->
                <div class="media-body">
                    <div class="t-comment-heading">
                        <!-- Tên người dùng -->
                        <div class="t-danhgia-username pull-left"><a href="<?php echo base_url('trangCaNhan/danhGia/'.$binhLuan['TenDangNhap']); ?>"><?php echo $ten; ?></a></div>
                        <div class="pull-right">
                            <!-- Ngày tháng -->
                            <div class="t-danhgia-date"><?php echo date('H:i d/m/Y', strtotime($binhLuan['NgayTaoBLMA'])); ?></div>
                            <!-- Nút xóa -->
                            <?php if ($this->session->userdata('logged_in') && ($this->session->userdata('tenDangNhap') == $binhLuan['TenDangNhap'] || $this->session->userdata('maQH') == 0)): ?>
                            <button title="Xóa" class="t-btn-delete" value="<?php echo $binhLuan['MaBLMA']; ?>">
                                <img src="<?php echo base_url('assets/images/app/delete.png'); ?>"></button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="t-comment-body"><?php echo $binhLuan['NoiDungBLMA'] ?></div>
                </div> 

                <!-- Like, count like -->
                <div class="t-like-panel media-footer">
                    <?php if ($this->session->userdata('logged_in')): ?>
                    <button class="btn btn-default btn-xs like-comment" value="<?php echo $binhLuan['MaBLMA']; ?>">
                        <img src="<?php echo base_url('assets/images/app/like.png'); ?>"> <span class="<?php echo 'likeCmt'.$binhLuan['MaBLMA']; ?>"><?php echo $this->BinhLuanMA_model->isLiked($binhLuan['MaBLMA']) ? 'Bỏ thích' : 'Thích'; ?></span>
                    </button>
                    <?php endif; ?>
                    <div class="t-like-count pull-right">
                        <img src="<?php echo base_url('assets/images/app/like_num.png'); ?>"> <span class="<?php echo 'numLikeCmt'.$binhLuan['MaBLMA']; ?>"><?php echo $binhLuan['TongLuotThichBLMA'] ?></span>
                    </div>
                </div>     
            </div>         
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php if ($this->session->userdata('logged_in')): ?>
    <div class="panel-body input-group">       
        <input type="text" id="comment" class="form-control" placeholder="Viết bình luận...">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default t-btn-default comment">Bình luận</button>
        </div>   
    </div>
    <?php endif; ?>

</div>
