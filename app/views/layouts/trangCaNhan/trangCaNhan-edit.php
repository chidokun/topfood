<script src=<?php echo base_url('assets/js/thayDoiThongTin_js.js'); ?> ></script>

<div class="panel panel-default">
    <div class="panel-heading t-panel-header">Chỉnh sửa thông tin ngươi dùng</div>
    <div class="panel-body">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
            <?php echo form_open('trangCaNhan/updateThongTin/'.$nguoiDung_data['TenDangNhap']); ?>
          <div class="form-group">
            <label for="usr">Tên người dùng</label>
            <input type="text" class="form-control" id="tenNguoiDung" value="<?php echo $nguoiDung_data['TenNguoiDung'] ;?>" name="tenNguoiDung">
          </div>

          <div class="form-group">
              <label for="ngaySinh">Ngày sinh</label>
              <input type="date" class="form-control" id="ngaySinh" value="<?php echo $nguoiDung_data['NgaySinh'] ;?>" name="ngaySinh">
          </div>

          <div class="form-group">
            <label>Giới tính</label>
            <?php if ($nguoiDung_data['GioiTinh']=='Nam'): ?> 
                <div class="btn-group btn-group-justified" id="gioiTinh">
                    <div href="#" class="btn btn-default t-btn-default">Nam</div>
                    <div href="#" class="btn btn-default">Nữ</div>
                    <div href="#" class="btn btn-default">Khác</div>
                </div>
                <input type="text" name="gioiTinh" style="display: none;" value="Nam">
            <?php elseif ($nguoiDung_data['GioiTinh']=='Nữ'): ?>
                <div class="btn-group btn-group-justified" id="gioiTinh">
                    <div href="#" class="btn btn-default ">Nam</div>
                    <div href="#" class="btn btn-default t-btn-default">Nữ</div>
                    <div href="#" class="btn btn-default">Khác</div>
                </div>
                <input type="text" name="gioiTinh" style="display: none;" value="Nữ">
            <?php elseif ($nguoiDung_data['GioiTinh']=='Khác'): ?>
                <div class="btn-group btn-group-justified" id="gioiTinh">
                    <div href="#" class="btn btn-default ">Nam</div>
                    <div href="#" class="btn btn-default">Nữ</div>
                    <div href="#" class="btn btn-default t-btn-default">Khác</div>
                </div>
                <input type="text" name="gioiTinh" style="display: none;" value="Khác">
            <?php endif; ?>
        </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" value="<?php echo $nguoiDung_data['Email'] ;?>" name="email">
          </div>

          <div class="form-group">
            <label for="gioiThieuBanThan">Giới thiệu bản thân</label>
            <textarea class="form-control" rows="5" id="gioiThieu" name="gioiThieuBanThan"><?php echo $nguoiDung_data['GioiThieuBanThan'] ;?></textarea>
          </div>

          <div class="form-group ">
             <div class="pull-right">
                 <button type="submit" style="width:80px" class="btn btn-default t-btn-default" id="submit" name="submit">Lưu</button>
                <a href="<?php echo base_url('trangCaNhan/info/'.$nguoiDung_data['TenDangNhap']);?>" style="width:80px" class="btn btn-default t-btn" id="huy" name="huy">Hủy bỏ</a>
            </div> 
          </div>
          <?php echo form_close(); ?>
        </div>
      <div class="col-md-4"></div>
    </div>
</div>