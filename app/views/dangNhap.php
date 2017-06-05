<div class="container" style="margin: 38px 15px;">
	<div class="col-md-8">
		<center>
			<img src="<?php echo base_url(); ?>/assets/images/app/logo_large.png">
        </center>
        <h1>Chào mừng bạn đến với TopFood</h1>
        <h2>Website đánh giá địa điểm ăn uống<br>hàng đầu Việt Nam</h1>
    </div>
    <div class="col-md-4 t-register-panel t-login-panel">
        <?php if ($this->session->flashdata('registered')) :?>
            <p class='alert alert-dismissable alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
            <?php echo $this->session->flashdata('registered'); ?>
            </p>
		<?php elseif ($this->session->flashdata('login_failed')) : ?>
			<p class='alert alert-dismissable alert-danger'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
			<?php echo $this->session->flashdata('login_failed'); ?>
			</p>
        <?php elseif ($this->session->flashdata('logged_out')) : ?>
            <p class='alert alert-dismissable alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
			<?php echo $this->session->flashdata('logged_out'); ?>
			</p>
        <?php endif; ?>
		<?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
        <?php echo form_open('DangNhap'); ?>

            <div class="form-group">
                <label for="usr">Tên đăng nhập</label>
                <input type="text" class="form-control" id="tenDangNhap" name="tenDangNhap" value=<?php echo set_value('tenDangNhap'); ?>>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="matKhau" name="matKhau">
            </div>

            <div class="form-group" style="overflow: auto;">
                <button type="submit" name="submit" class="btn btn-default t-btn-default pull-right" value="submit">Đăng nhập</button>
            </div>
        <?php echo form_close(); ?>

        <div class="form-group" style="clear: right;">
            <span style="font-size: 23px; display: block;">Chưa có tài khoản?</span>
            Hãy <a href="<?php echo base_url('dangKy'); ?>">Đăng ký</a> ngay!
        </div>  
    </div>
    
</div>
