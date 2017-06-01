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

<script src="<?php echo base_url('assets/js/danhGiaDiaDiem_js.js'); ?>"></script>
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
        <div class="t-like-panel">
            <button class="btn btn-default btn-xs pull-left like-review" value="<?php echo $danhGia['MaDGDD']; ?>">
                <img src="<?php echo base_url('assets/images/app/like.png'); ?>"> Thích</a>
            <div class="pull-right">
                <div class="t-like-count" style="display: inline-block;">
					<img src=<?php echo base_url('assets/images/app/like_num.png'); ?>> <?php echo $danhGia['TongLuotThichDGDD'];?> 
				</div>
				<div class="t-like-count" style="display: inline-block;">
					<img src=<?php echo base_url('assets/images/app/comment.png'); ?>> <?php echo count($cacBinhLuan);?> 
				</div>
            </div>
        </div>
    </div>
    <div id="commentPane">
        <?php if (count($cacBinhLuan) == 0) : ?>
        <div class="panel-footer">Chưa có bình luận</div>
        <?php else: ?>
        <?php foreach($cacBinhLuan as $binhLuan) : ?>
        <div class="panel-footer">
            <div class="media">
                <div class="t-comment-avatar media-left">
                    <?php $user = $this->NguoiDung_model->select($binhLuan['TenDangNhap']); 
                          $img = $user['AnhDaiDien'];
                          $ten = $user['TenNguoiDung'];
                    ?>
                    <img src="<?php echo base_url('assets/images/db/'.$img); ?>">
                </div>
                <div class="media-body">
                    <div class="t-comment-heading">
                        <div class="t-danhgia-username pull-left"><?php echo $ten; ?></div>
                        <div class="t-danhgia-date pull-right"><?php echo date('H:i d/m/Y', strtotime($binhLuan['NgayTaoBLDD'])); ?></div>
                    </div>
                    <div class="t-comment-body"><?php echo $binhLuan['NoiDungBLDD'] ?></div>
                </div> 
                <div class="t-like-panel media-footer">
                    <button class="btn btn-default btn-xs pull-left like-comment" value="<?php echo $binhLuan['MaBLDD']; ?>">
                        <img src="<?php echo base_url('assets/images/app/like.png'); ?>"> Thích</button>
                    <div class="t-like-count pull-right">
                        <img src="<?php echo base_url('assets/images/app/like_num.png'); ?>"> <?php echo $binhLuan['TongLuotThichBLDD'] ?> 
                    </div>
                </div>     
            </div>         
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="panel-body input-group">
        <input type="text" id="comment" class="form-control" placeholder="Viết bình luận...">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default t-btn-default comment">Bình luận</button>
        </div>
    </div>
</div>
