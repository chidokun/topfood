<script src="<?php echo base_url('assets/js/suaMonAn_js.js'); ?>"></script>

<div class="panel panel-default">
    <div class="panel-heading t-panel-header">
	    Thay đổi thông tin món ăn
    </div>
    <?php echo form_open('monAn/updateMonAn/'.$monAn['MaMonAn']); ?>
    <div class="panel-body">
        <?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <!--Tên địa điểm-->
            <div class="form-group ">
                <label>Tên món ăn</label>
                <input type="text" class="form-control" id="tenMonAn" name="tenMonAn" placeholder="Không quá 255 ký tự" value="<?php echo $monAn['TenMonAn']; ?>">
            </div>
            <!--Địa chỉ-->
            <div class="form-group">
                <label>Giá cả</label>
                <input type="text" class="form-control" id="giaCaMA" name="giaCaMA" value="<?php echo $monAn['GiaCaMA']; ?>">
            </div>
             <!--Loại món ăn-->
            <div class="form-group">
                <label>Loại món ăn</label>
                <div class="btn-group btn-group-justified" id="loaiMonAn">
					<?php if ($monAn['MaLoaiMonAn']==0) :?>
						<div href="#" class="btn btn-default t-btn-default" value="0">Món ăn</div>
						<div href="#" class="btn btn-default" value="1">Thức uống</div>
					<?php elseif ($monAn['MaLoaiMonAn']==1) :?>
						<div href="#" class="btn btn-default t-btn-default" value="0">Món ăn</div>
						<div href="#" class="btn btn-default" value="1">Thức uống</div>
					<?php endif; ?>
                </div>
                <input type="text" name="maLoaiMonAn" value="<?php echo $monAn['MaLoaiMonAn']; ?>" style="display: none;">
            </div>
            <!--Comment--> 
            <div class="form-group">
                <label for="comment">Mô tả món ăn</label>
                <textarea class="form-control" rows="5" id="moTaMA" name="moTaMA" placeholder="Viết vài dòng giới thiệu về món ăn ..."><?php echo $monAn['MoTaMA']; ?></textarea>
            </div> 
			<div class="form-group">
            	<button type="submit" id="submit" value="submit" name="submit" class="btn btn-default t-btn-default pull-right">Lưu món ăn</button>
        	</div>
        </div>
        <div class="col-md-3">             
        </div>
        
    </div>
    <?php echo form_close(); ?>
</div>