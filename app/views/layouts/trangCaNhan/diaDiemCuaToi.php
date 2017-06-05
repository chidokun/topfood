  <div class="panel panel-default">
    <div class="panel-heading t-panel-header">Địa điểm của tôi</div>
    <div class="panel-body">
        <div class="col-md-12" style="padding: 20px 10px 20px;">    
            <?php if (count($cacDiaDiem) == 0) : ?>
                <p class='alert alert-dismissable alert-success'>Chưa có đánh giá nào.</p>
            <?php else: ?>
            <?php foreach ($cacDiaDiem as $diaDiem) : ?>
                
                <div class="t-thucdon-item" style="position: relative;">
                    <div class="t-thucdon-item-avatar pull-left">
                        <img src="<?php echo base_url('assets/images/db/'.$diaDiem['AnhDaiDienDD']); ?>">
                    </div>
                    <div class="t-thucdon-item-content pull-left">
                        <div class="t-thucdon-item-monan"><?php echo $diaDiem['TenDiaDiem']; ?></div>
                        <div><?php echo $diaDiem['DiaChi']; ?></div>
                        <div><?php echo $diaDiem['MoTaDD']; ?></div>
                        
                    </div>
                    <div class="t-danhgia-diem pull-right" style="margin: 10px;">
                        <div><?php echo number_format($diaDiem['DiemTrungBinhDD'],1); ?></div>
                    </div>
                    <a style="position: absolute; bottom: 0; right: 0; margin: 10px;" href="<?php echo base_url('diaDiem/cacDanhGia/'.$diaDiem['MaDiaDiem']); ?>" class="btn btn-default btn-xs pull-right">Xem chi tiết</a>
                </div>

            <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</div>
