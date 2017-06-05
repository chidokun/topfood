  <div class="panel panel-default">
    <div class="panel-heading t-panel-header">Thay đổi mật khẩu</div>
    <div class="panel-body">

      <div class="col-md-4"></div>

      <div class="col-md-4">
        <?php if ($this->session->flashdata('pass_update_failed')): ?>
          <p class='alert alert-dismissable alert-danger'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
              <?php echo $this->session->flashdata('pass_update_failed'); ?>
          </p>
        <?php endif; ?>
        <?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
        <?php echo form_open('trangCaNhan/updateMatKhau/'.$nguoiDung_data['TenDangNhap']); ?>

        <div class="form-group">
          <label for="matKhauCu">Mật khẩu cũ</label>
          <input type="password" class="form-control" id="matKhauCu" name="matKhauCu">
        </div>

        <div class="form-group">
          <label for="matKhauMoi">Mật khẩu mới</label>
          <input type="password" class="form-control" id="matKhauMoi" name="matKhauMoi">
        </div>

        <div class="form-group">
          <label for="nhapLaiMatKhauMoi">Nhập lại mật khẩu mới</label>
          <input type="password" class="form-control" id="nhapLaiMatKhau" name="nhapLaiMatKhau">
        </div>
        
        <div class="form-group">
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
