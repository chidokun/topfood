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
<body class="t-bg-register">
    <?php $this->load->view('layouts/navBar'); ?>      
    <div class="container">
     
    <?php $this->load->view($main_content); ?>
      
    </div> <!-- /container -->

    <footer class="t-footer-register">
    <div class="container">
        <p class="pull-left">&copy; 2017 TopFood. Mọi quyền được bảo vệ.</p>
        <p class="pull-right">Giới thiệu | Liên hệ | Điều khoản sử dụng | Chính sách bảo mật</p>
    </div>
    </footer>
</body>
</html>