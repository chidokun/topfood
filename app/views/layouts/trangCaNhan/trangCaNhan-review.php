<div class="panel panel-default">
    <div class="panel-heading t-panel-header">Các bài đánh giá <span class="pull-right">Tổng cộng <?php echo count($danhGiaDiaDiem) + count($danhGiaMonAn); ?> bài đánh giá</span></div>
    <div class="panel-body">
        <!-- Điều hướng -->
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#dgdd">Đánh giá địa điểm</a></li>
            <li><a data-toggle="tab" href="#dgma">Đánh giá món ăn</a></li>
        </ul>

        <div class="tab-content">
            <!-- Đánh giá địa điểm -->
            <div id="dgdd" class="tab-pane fade in active">
                <div class="col-md-12" style="padding: 20px 10px 20px;">    
                    <?php if (count($danhGiaDiaDiem) == 0) : ?>
                            <p class='alert alert-dismissable alert-success'>Chưa có đánh giá nào.</p>
                    <?php else: ?>
                    <?php foreach ($danhGiaDiaDiem as $danhGia) : ?>
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
            </div>
            <!-- Đánh giá món ăn -->
            <div id="dgma" class="tab-pane fade">
                <div class="col-md-12" style="padding: 20px 10px 20px;">
                    <?php if (count($danhGiaMonAn) == 0) : ?>
                        <p class='alert alert-dismissable alert-success'>Chưa có đánh giá nào.</p>
                    <?php else: ?>
                    <?php foreach ($danhGiaMonAn as $danhGia) : ?>
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
                                <a href="<?php echo base_url('monAn/cacDanhGia/'.$danhGia['MaMonAn'].'/'.$danhGia['MaDGMA']); ?>" class="btn btn-default btn-xs pull-right">Xem đánh giá</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>