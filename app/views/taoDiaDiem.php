<!DOCTYPE html>
<html>
<head>
	<title>TopFood</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
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
	    <ul class="nav navbar-nav navbar-right">
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào, <b>Nguyễn Tuấn</b> 
	        <img class="t-avatar-navbar" src="<?php echo base_url(); ?>assets/images/db/avatar_temp.png">
	        <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="#">Trang cá nhân</a></li>
	          <li><a href="#">Tạo địa điểm</a></li>
	          <li class="divider"></li>
	          <li><a href="#">Duyệt các địa điểm chờ</a></li>
	          <li class="divider"></li>
	          <li><a href="#">Đăng xuất</a></li>
	        </ul>
	      </li>
	    </ul>
	  </div><!-- /.navbar-collapse -->
	  </div>
	</nav>
    <div class="container">
     	<div class="t-wrapper">
     		<p id="t-taodiadiem"><b>Tạo địa điểm mới</b></p>
    		<div class="t-body">
    			<div class="col-md-3">
    				<div class="t-avartar"><img src="<?php echo base_url(); ?>/assets/images/app/Picture.png" class="t-imgavartar"></div>
    				<p id="t-lbthemavartar"><i>Nhấn để thêm ảnh đại diện</i></p>
    			</div>
    			<div class="col-md-9" id="t-col-9">
    				<div class="col-md-6">
    					<ul>
    						<li id="t-tendiadiem"><b>Tên địa điểm</b></li>
    						<li><input type="text" name="tendiadiem" placeholder="Tối đa 100 ký tự" class="t-input form-control"></li>
    						<li><b>Địa chỉ</b></li>
    						<li><input type="text" name="diachi" class="t-input form-control"></li>
    						<li><b>Số điện thoại</b></li>
    						<li><input type="text" name="sodienthoai" class="t-input form-control"></li>
    						<li><b>Email</b></li>
    						<li><input type="text" name="email" class="t-input form-control"></li>
    						<li><b>Website</b></li>
    						<li><input type="text" name="website" class="t-input form-control"></li>
    						<li>
    							<div class="t-col-6">
    								<span><b>Giờ mở cửa</b></span>
    								<input type="text" name="website" class="t-giomocua t-input form-control" placeholder="hh:mm">
    							</div>
    							<div class="t-col-6 " >
    								<span class="t-giodongcua"><b>Giờ đóng cửa</b></span>
    								<input type="text" name="website" class="t-giodongcua t-input form-control" placeholder="hh:mm">
    							</div>
    						</li>
    						<li><b>Mô tả địa điểm</b></li>
    						<li><input type="text" name="motadiadiem" class="t-input form-control" id="t-motadiadiem"></li>
    					</ul>
    				</div>
    				<div class="col-md-6">
    					<label id="t-danhmuchinhanh">Danh mục hình ảnh</label>
    					<div class="t-listImg"><img src="<?php echo base_url(); ?>/assets/images/app/Picture.png" class="t-imgavartar"></div>
    				</div>
    			</div>
    		</div>
    		<div class="t-btn">
    			<button type="button" class="btn btn-default" id="t-btntaodiadiem"><b>Tạo địa điểm</b></button>
    			<button type="button" class="btn btn-default" id="t-btndatlai"><b>Đặt lại</b></button>
    		</div>
     	</div>
    <!-- nội dung -->
    </div> <!-- /container -->

    <footer class="t-footer">
    <div class="container">
        <p class="pull-left">&copy; 2017 TopFood. Mọi quyền được bảo vệ.</p>
        <p class="pull-right">Giới thiệu | Liên hệ | Điều khoản sử dụng | Chính sách bảo mật</p>
    </div>
    </footer>
</body>
</html>