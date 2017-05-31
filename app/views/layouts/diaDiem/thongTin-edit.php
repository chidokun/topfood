<div class="panel panel-default">
    <div class="panel-heading t-panel-header">
	    Chỉnh sửa thông tin địa điểm
    </div>
    <div class="panel-body">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
        <?php echo form_open('diaDiem/updateInfo/'.$diaDiem_data['MaDiaDiem']); ?>
            <!--Tên địa điểm-->
            <div class="form-group ">
                <label>Tên địa điểm</label>
                <input type="text" class="form-control" id="tenDiaDiem" name="tenDiaDiem" placeholder="Không quá 100 ký tự" value="<?php echo $diaDiem_data['TenDiaDiem']; ?>">
            </div>
            <!--Địa chỉ-->
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" id="diaChi" name="diaChi" value="<?php echo $diaDiem_data['DiaChi']; ?>">
            </div>
            <!--SDT-->
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" id="soDT" name="soDT" value="<?php echo $diaDiem_data['SoDT']; ?>">
            </div>
            <!--Email-->  
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="emailDD" name="emailDD" value="<?php echo $diaDiem_data['EmailDD']; ?>">
            </div>
            <!--Website--> 
            <div class="form-group">
                <label>Website</label>
                <input type="text" class="form-control" id="website" name="website" value="<?php echo $diaDiem_data['Website']; ?>">
            </div>
            <!--Giờ đóng mở cửa--> 
            <div class="row">
                <div class="col-md-6 form-group t-gio">
                    <label for="usr">Giờ mở cửa</label>
                    <input type="text" class="form-control" id="gioMoCua" name="gioMoCua" placeholder="hh:mm" value="<?php echo date('H:i',strtotime($diaDiem_data['GioMoCua'])); ?>">
                </div>
                <div class="col-md-6 form-group t-gio">
                    <label for="usr">Giờ đóng cửa</label>
                    <input type="text" class="form-control" id="gioDongCua" name="gioDongCua" placeholder="hh:mm" value="<?php echo date('H:i',strtotime($diaDiem_data['GioDongCua'])); ?>">
                </div>
            </div>
            <!--Comment--> 
            <div class="form-group">
                <label for="comment">Mô tả địa điểm</label>
                <textarea class="form-control" rows="5" id="moTaDD" name="moTaDD"><?php echo $diaDiem_data['MoTaDD']; ?></textarea>
            </div> 
            <div class="pull-right">
                <button type="submit" class="btn btn-default t-btn-default" style="width: 100px;">Lưu</button>
                <button class="btn btn-default t-btn" style="width: 100px;" onclick="javascript:history.go(-1);">Hủy bỏ</button>
            </div>
        <?php echo form_close(); ?>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>