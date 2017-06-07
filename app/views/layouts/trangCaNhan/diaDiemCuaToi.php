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
                    <a href="<?php echo base_url('diaDiem/cacDanhGia/'.$diaDiem['MaDiaDiem']); ?>">
                        <img src="<?php echo $diaDiem['AnhDaiDienDD'] ? base_url('assets/images/db/'.$diaDiem['AnhDaiDienDD']): base_url('assets/images/app/place.png'); ?>">
                    </a>
                    </div>
                    <div class="t-thucdon-item-content pull-left">
                        <div class="t-thucdon-item-monan"><a href="<?php echo base_url('diaDiem/cacDanhGia/'.$diaDiem['MaDiaDiem']); ?>"><?php echo $diaDiem['TenDiaDiem']; ?></a></div>
                        <div><?php echo $diaDiem['DiaChi']; ?></div>
                        <div><i><?php echo $diaDiem['MoTaDD']; ?></i></div>
                        
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
