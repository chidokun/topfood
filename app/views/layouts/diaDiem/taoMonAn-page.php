<script src="<?php echo base_url('assets/js/taoMonAn_js.js'); ?>"></script>

<div class="panel panel-default">
    <div class="panel-heading t-panel-header">
	    Tạo món ăn
    </div>
    <?php echo form_open_multipart('monAn/insertMonAn/'.$diaDiem_data['MaDiaDiem']); ?>
    <div class="panel-body">
        <?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
        <div class="col-md-3">
            <input type="text" name="maDiaDiem" value="<?php echo $diaDiem_data['MaDiaDiem']; ?>" style="display: none;">
            <div class="form-group ">
                <label>Ảnh đại diện</label>
                <div class="t-avatar" style="height: 160px; width: 160px;"></div>
                <p class="t-lbavatar"><i>Nhấn để thêm ảnh đại diện</i></p>
                <input type="file" id="anhDaiDienMA" name="anhDaiDienMA" style="display: none;">
            </div>
        </div>
        <div class="col-md-4">
            <!--Tên địa điểm-->
            <div class="form-group ">
                <label>Tên món ăn</label>
                <input type="text" class="form-control" id="tenMonAn" name="tenMonAn" placeholder="Không quá 255 ký tự" value="<?php echo set_value('tenMonAn'); ?>">
            </div>
            <!--Địa chỉ-->
            <div class="form-group">
                <label>Giá cả</label>
                <input type="text" class="form-control" id="giaCaMA" name="giaCaMA" value="<?php echo set_value('giaCaMA'); ?>">
            </div>
             <!--Loại món ăn-->
            <div class="form-group">
                <label>Loại món ăn</label>
                <div class="btn-group btn-group-justified" id="loaiMonAn">
                    <div href="#" class="btn btn-default t-btn-default" value="0">Món ăn</div>
                    <div href="#" class="btn btn-default" value="1">Thức uống</div>
                </div>
                <input type="text" name="maLoaiMonAn" value="0" style="display: none;">
            </div>
            <!--Comment--> 
            <div class="form-group">
                <label for="comment">Mô tả món ăn</label>
                <textarea class="form-control" rows="5" id="moTaMA" name="moTaMA" placeholder="Viết vài dòng giới thiệu về món ăn ..."><?php echo set_value('moTaMA'); ?></textarea>
            </div> 
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label>Danh mục hình ảnh</label>
                <button type="button" id="themHinhAnh" class="btn btn-default t-btn-default" style="display: block;"><span class="glyphicon glyphicon-picture"></span> Chọn hình ảnh</button>
            </div>
            <input type="file" id="danhMucHinhAnh" name="danhMucHinhAnh[]" multiple="multiple" style="display: none">
            <div id="hinhAnhBg"></div>      
        </div>
        <div class="col-md-12">
            <button type="submit" id="submit" value="submit" name="submit" class="btn btn-default t-btn-default pull-right">Tạo món ăn</button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>