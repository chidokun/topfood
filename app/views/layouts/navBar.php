<nav class="navbar navbar-inverse" role="navigation">
    <div class="container t-content">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="<?php echo base_url(); ?>"><img class="t-logo_nav" src="<?php echo base_url(); ?>/assets/images/app/logo_nav.png"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">    
        <div class="t-inline">
            <form class="navbar-form form-inline" role="search">
                <div class="form-group">
                    <select class="form-control">
                         <option value="place">Địa điểm</option>
                         <option value="food">Món ăn</option>
                         <option value="user">Người dùng</option>
                     </select>
                </div>       		
                <div class="input-group t-search-box">
                    <input type="text" class="form-control" placeholder="Địa điểm, món ăn, người dùng,..." name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <?php if(!$this->session->userdata('logged_in')) :?>
        <div class="nav navbar-nav navbar-right">
            <a href=<?php echo base_url("DangNhap"); ?> class="btn t-btn-default navbar-btn">Đăng nhập</a>
            <a href=<?php echo base_url("DangKy"); ?> class="btn t-btn-default navbar-btn">Đăng ký</a>
        </div>
        <?php else: ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <?php $user = $this->NguoiDung_model->select($this->session->userdata('tenDangNhap'));?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào, <b id="tenNguoiDungNav"><?php echo $user['TenNguoiDung']; ?></b> 
            <img class="t-avatar-navbar" id="imgNguoiDungNav" src="<?php echo base_url('assets/images/db/'.$user['AnhDaiDien']); ?>">
            <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">Trang cá nhân</a></li>
                <li><a href=<?php echo base_url('taoDiaDiem'); ?>>Tạo địa điểm</a></li>
                <li class="divider"></li>
                <li><a href="#">Duyệt các địa điểm chờ</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url('dangNhap/logout');?>">Đăng xuất</a></li>
            </ul>
          </li>
        </ul>
        <?php endif; ?>
      </div><!-- /.navbar-collapse -->
      </div>
    </nav>