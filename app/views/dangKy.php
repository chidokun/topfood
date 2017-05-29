<script src=<?php echo base_url( "assets/js/dangKy_js.js"); ?>
    >
</script>

<div class="t-logo_middle">
    <center>
        <img src="<?php echo base_url(); ?>/assets/images/app/logo_middle.png">
    </center>
</div>
<div class="container t-register-panel" style="overflow: auto;">
    <div class="col-md-4" style="margin: 30px 15px;">
        <div class="t-avatar">
        </div>
        <p class="t-lbavatar">Nhấn để thêm ảnh đại diện</p>
    </div>
    <div class="col-md-6" style="margin: 30px 15px">
        <?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
        <?php echo form_open_multipart('dangKy'); ?>

        <input type="file" id="anhDaiDien" name="anhDaiDien" style="display: none;">

        <div class="form-group">
            <label for="usr">Tên đăng nhập</label>
            <input type="text" class="form-control" id="tenDangNhap" name="tenDangNhap" value=<?php echo set_value( 'tenDangNhap'); ?>>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" id="matKhau" name="matKhau">
        </div>

        <div class="form-group">
            <label for="passwordAgain">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="matKhauAgain" name="matKhauAgain">
        </div>

        <div class="form-group">
            <label for="tenNguoiDung">Tên người dùng</label>
            <input type="text" class="form-control" id="tenNguoiDung" name="tenNguoiDung" value=<?php echo set_value( 'tenNguoiDung');
                ?>>
        </div>

        <div class="form-group">
            <label for="ngaySinh">Ngày sinh</label>
            <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" value=<?php echo set_value( 'ngaySinh'); ?>>
        </div>

        <div class="form-group">
            <label>Giới tính</label>
            <div class="btn-group btn-group-justified" id="gioiTinh">
                <div href="#" class="btn btn-default t-btn-default">Nam</div>
                <div href="#" class="btn btn-default">Nữ</div>
                <div href="#" class="btn btn-default">Khác</div>
            </div>
            <input type="text" name="gioiTinh" style="display: none;">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com" value=<?php echo set_value(
                'email'); ?>>
        </div>

        <div class="form-group">
            <label for="gioiThieu">Giới thiệu bản thân</label>
            <textarea class="form-control" rows="5" id="gioiThieuBanThan" name="gioiThieuBanThan" placeholder="Viết vài dòng giới thiệu bản thân ..."><?php echo set_value('gioiThieuBanThan'); ?></textarea>
        </div>

        <div class="form-group">
            <label>
                    <input type="checkbox" id="agree" name="agree" value="agree" unchecked> Tôi đồng ý với điều khoản sử dụng.
            </label>
        </div>

        <div class="form-group">
            <button id="register" class="btn t-btn-default pull-right" data-toggle="modal" data-target="#myModal">Đăng ký tài khoản</button>
        </div>
        <?php echo form_close(); ?>

    </div>
</div>
