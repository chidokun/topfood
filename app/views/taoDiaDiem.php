<script src=<?php echo base_url( "assets/js/taoDiaDiem_js.js"); ?>></script>

<div class="panel panel-default">
    <div class="panel-heading t-panel-header">Tạo địa điểm mới</div>
    <?php echo form_open_multipart('taoDiaDiem'); ?>
    <div class="panel-body">
        <div class="col-md-3">
            <div class="t-avatar"></div>
            <p class="t-lbavatar"><i>Nhấn để thêm ảnh đại diện</i></p>
        </div>

        <div class="col-md-9 t-col-9">
            <div class="col-md-6">
                <?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
                <input type="file" id="anhDaiDienDD" name="anhDaiDienDD" style="display: none;">
        
                <!--Tên địa điểm-->
                <div class="form-group ">
                    <label>Tên địa điểm</label>
                    <input type="text" class="form-control" id="tenDiaDiem" name="tenDiaDiem" placeholder="Không quá 100 ký tự" value=<?php echo set_value('tenDiaDiem'); ?>>
                </div>
                <!--Địa chỉ-->
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" id="diaChi" name="diaChi" value=<?php echo set_value('diaChi'); ?>>
                </div>
                <!--SDT-->
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" id="soDT" name="soDT" value=<?php echo set_value('soDT'); ?>>
                </div>
                <!--Email-->  
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="emailDD" name="emailDD" value=<?php echo set_value('emailDD'); ?>>
                </div>
                <!--Website--> 
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" class="form-control" id="website" name="website" value=<?php echo set_value('website'); ?>>
                </div>
                <!--Giờ đóng mở cửa--> 
                <div class="row">
                    <div class="col-md-6 form-group t-gio">
                        <label for="usr">Giờ mở cửa</label>
                        <input type="text" class="form-control" id="gioMoCua" name="gioMoCua" placeholder="hh:mm" value=<?php echo set_value('gioMoCua'); ?>>
                    </div>
                    <div class="col-md-6 form-group t-gio">
                        <label for="usr">Giờ đóng cửa</label>
                        <input type="text" class="form-control" id="gioDongCua" name="gioDongCua" placeholder="hh:mm" value=<?php echo set_value('gioDongCua'); ?>>
                    </div>
                </div>
                <!--Comment--> 
                <div class="form-group">
                    <label for="comment">Mô tả địa điểm</label>
                    <textarea class="form-control" rows="5" id="moTaDD" name="moTaDD"><?php echo set_value('moTaDD'); ?></textarea>
                </div> 
            </div>
            <!--Danh mục hình ảnh-->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Danh mục hình ảnh</label>
                    <button type="button" id="themHinhAnh" class="btn btn-default t-btn-default" style="display: block;"><span class="glyphicon glyphicon-picture"></span> Chọn hình ảnh</button>
                </div>
                <input type="file" id="danhMucHinhAnh" name="danhMucHinhAnh[]" multiple="multiple" style="display: none">
                <div id="hinhAnhBg"></div>
            </div>
        </div>  
    </div>
    <!--Button-->
    <div class="panel-body">
        <div class="pull-right">
            <button type="submit" id="taoDiaDiem" class="btn btn-default t-btn-default" style="width: 125px;">Tạo địa điểm</button>
            <button type="reset" class="btn btn-default t-btn" style="width: 125px;">Đặt lại</button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
