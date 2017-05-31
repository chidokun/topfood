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
            <button class="btn btn-default btn-xs pull-left">Thích</button>
            <div class="t-like-count pull-right">
                <img src=""> 2
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <div class="t-comment">
            <div class="t-comment-avatar pull-left">
                <img src="">
            </div>
            <div>
                <div class="t-comment-heading">
                    <div class="t-danhgia-username pull-left">@nH CkOànG kHO@| pÉ xÝu</div>
                    <div class="t-danhgia-date pull-right">10:17 25/04/2017</div>
                </div>
                <div class="t-comment-body">
                    Chuẩn, đồ ăn thấy gớm, mắc ói<br>
                    Chuẩn, đồ ăn thấy gớm, mắc ói<br>
                    Chuẩn, đồ ăn thấy gớm, mắc ói<br>
                    Chuẩn, đồ ăn thấy gớm, mắc ói<br>
                </div>
            </div>
            <div class="t-like-panel">
                <button class="btn btn-default btn-xs pull-left">Thích</button>
                <div class="t-like-count pull-right">
                    <img src=""> 2
                </div>
            </div>
        </div>         
    </div>
    <div class="panel-body input-group">
            <input type="text" name="comment" class="form-control" placeholder="Viết bình luận...">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default t-btn-default">Bình luận</button>
            </div>
    </div>
</div>