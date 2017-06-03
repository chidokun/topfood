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
<script src="<?php echo base_url('assets/js/danhGiaDiaDiem_js.js'); ?>"></script>
<!-- Lưu mã đánh giá địa điểm -->
<input type="text" id="maDGDD" value="<?php echo $danhGia['MaDGDD']; ?>" style="display:none">
<div class="panel panel-default">  
    <!-- Header -->
    <div class="panel-heading media" style="overflow: auto;">
        <!-- Avatar và thông tin người đánh giá -->
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
        <!-- Điểm trung bình đánh giá -->
        <div class="media-right">
            <div class="t-danhgia-diem">
                <div><?php echo number_format($danhGia['DiemTrungBinhDGDD'], 1); ?></div>
            </div>
        </div>
    </div>

    <!-- Nội dung đánh giá -->
    <div class="panel-body">
        <div class="t-danhgia-item-content-heading"><?php echo $danhGia['TieuDeDGDD'];?></div>
        <div class="t-danhgia-item-content-body">
            <?php echo $danhGia['BaiNhanXetDGDD']; ?>
        </div> 

        <!-- Các nút control -->  
        <div class="t-like-panel">
            <!-- Nút like, chỉ xuất hiện khi đã đăng nhập -->
            <?php if ($this->session->userdata('logged_in')): ?>
            <button class="btn btn-default btn-xs pull-left like-review" value="<?php echo $danhGia['MaDGDD']; ?>">
                <img src="<?php echo base_url('assets/images/app/like.png'); ?>"> <span id="reviewLikeBtn"><?php echo $this->DanhGiaDiaDiem_model->isLiked($danhGia['MaDGDD']) ? 'Bỏ thích' : 'Thích'; ?></span></button>
            <?php endif; ?>

            <!-- Bộ đếm like, cmt -->
            <div class="pull-right">
                <div class="t-like-count" style="display: inline-block;">
					<img src=<?php echo base_url('assets/images/app/like_num.png'); ?>> <span id="reviewLike"><?php echo $danhGia['TongLuotThichDGDD'];?></span>
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
        <div class="panel-footer cmt<?php echo $binhLuan['MaBLDD']; ?>">
            <div class="media">
                <!-- Ảnh đại diện -->
                <div class="t-comment-avatar media-left">
                    <?php $user = $this->NguoiDung_model->select($binhLuan['TenDangNhap']); 
                          $img = $user['AnhDaiDien'];
                          $ten = $user['TenNguoiDung'];
                    ?>
                    <img src="<?php echo base_url('assets/images/db/'.$img); ?>">
                </div>

                <!-- Nội dung bình luận -->
                <div class="media-body">
                    <div class="t-comment-heading">
                        <!-- Tên người dùng -->
                        <div class="t-danhgia-username pull-left"><?php echo $ten; ?></div>
                        <div class="pull-right">
                            <!-- Ngày tháng -->
                            <div class="t-danhgia-date"><?php echo date('H:i d/m/Y', strtotime($binhLuan['NgayTaoBLDD'])); ?></div>
                            <!-- Nút xóa -->
                            <?php if ($this->session->userdata('logged_in') && ($this->session->userdata('tenDangNhap') == $binhLuan['TenDangNhap'] || $this->session->userdata('maQH') == 0)): ?>
                            <button title="Xóa" class="t-btn-delete" value="<?php echo $binhLuan['MaBLDD']; ?>">
                                <img src="<?php echo base_url('assets/images/app/delete.png'); ?>"></button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="t-comment-body"><?php echo $binhLuan['NoiDungBLDD'] ?></div>
                </div> 

                <!-- Like, count like -->
                <div class="t-like-panel media-footer">
                    <?php if ($this->session->userdata('logged_in')): ?>
                    <button class="btn btn-default btn-xs like-comment" value="<?php echo $binhLuan['MaBLDD']; ?>">
                        <img src="<?php echo base_url('assets/images/app/like.png'); ?>"> <span class="<?php echo 'likeCmt'.$binhLuan['MaBLDD']; ?>"><?php echo $this->BinhLuanDD_model->isLiked($binhLuan['MaBLDD']) ? 'Bỏ thích' : 'Thích'; ?></span>
                    </button>
                    <?php endif; ?>
                    <div class="t-like-count pull-right">
                        <img src="<?php echo base_url('assets/images/app/like_num.png'); ?>"> <span class="<?php echo 'numLikeCmt'.$binhLuan['MaBLDD']; ?>"><?php echo $binhLuan['TongLuotThichBLDD'] ?></span>
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
