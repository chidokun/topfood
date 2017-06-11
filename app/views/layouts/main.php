<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
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
    <?php $this->load->view('layouts/navBar'); ?>  
    <div class="container" style="min-height: calc(100vh - 290px);">    
    <!-- nội dung -->
    <?php $this->load->view($main_content); ?>    
    </div> <!-- /container -->

    <footer class="t-footer">
    <div class="container">
        <p class="pull-left">&copy; 2017 TopFood. Mọi quyền được bảo vệ.</p>
        <p class="pull-right"><a href="<?php echo base_url('dieuHuong/content_updating'); ?>">Giới thiệu</a> | <a href="<?php echo base_url('dieuHuong/content_updating'); ?>">Liên hệ</a> | <a href="<?php echo base_url('dieuHuong/content_updating'); ?>">Điều khoản sử dụng</a> | <a href="<?php echo base_url('dieuHuong/content_updating'); ?>">Chính sách bảo mật</a></p>
    </div>
    </footer>
</body>
</html>