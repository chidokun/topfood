<div class="panel panel-default">
    <div class="panel-heading t-panel-header" style="overflow: auto;">
	    <div class="pull-left">Thực đơn</div>
        <?php if ($this->session->userdata('logged_in') && ($this->session->userdata('tenDangNhap') == $diaDiem_data['TenDangNhap'] || $this->session->userdata('maQH') == 0)): ?>
	    <div class="pull-right">
	    	<a href="<?php echo base_url('monAn/taoMonAn/'.$diaDiem_data['MaDiaDiem']); ?>" class="btn btn-default t-btn-default" style="margin: -8px 0 -4px; height: 30px; font-size: 90%;">
			<span class="glyphicon glyphicon-plus"></span> Thêm món ăn
			</a>
	    </div>
        <?php endif; ?>
    </div>
    <div class="panel-body">
        <?php if ($this->session->flashdata('food_deleted_successful')): ?> 
            <p class='alert alert-dismissable alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                <?php echo $this->session->flashdata('food_deleted_successful'); ?>
            </p>
		<?php endif; ?>
        <?php if (count($cacMonAn) == 0) : ?>
            <p class='alert alert-dismissable alert-success'>Chưa có món ăn</p>
        <?php else: ?>
            <?php foreach ($cacMonAn as $monAn): ?>
                <div class="t-thucdon-item" style="position: relative;">
                    <div class="t-thucdon-item-avatar pull-left">
                        <a href="<?php echo base_url('monAn/cacDanhGia/'.$monAn['MaMonAn']); ?>">
                            <img src="<?php echo $monAn['AnhDaiDienMA'] ? base_url('assets/images/db/'.$monAn['AnhDaiDienMA']) : base_url('assets/images/app/food.png'); ?>" class="t-imgavatarmonan">
                        </a>                
                    </div>
                    <div class="t-thucdon-item-content pull-left">
                        <div class="t-thucdon-item-monan"><?php echo $monAn['TenMonAn']; ?></div>
                        <div><i><?php echo $monAn['MaLoaiMonAn']=='0'?'Món ăn':'Thức uống';?></i></div>
                        <div><?php echo $monAn['MoTaMA']; ?></div>
                        <div style="color: #890606;"><span class="glyphicon glyphicon-tags"></span> <b><?php echo number_format($monAn['GiaCaMA'],0,',','.').'đ';?></b></div>
                    </div>
                    <div class="t-danhgia-diem pull-right" style="margin: 10px;">
                        <div><?php echo number_format($monAn['DiemTrungBinhMA'],1); ?></div>
                    </div>
                    <a style="position: absolute; bottom: 0; right: 0; margin: 10px;" href="<?php echo base_url('monAn/cacDanhGia/'.$monAn['MaMonAn']); ?>" class="btn btn-default btn-xs pull-right">Xem chi tiết</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>