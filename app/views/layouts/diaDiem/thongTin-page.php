<div class="panel panel-default">
    <div class="panel-heading t-panel-header">
	    Thông tin chi tiết
    </div>
    <div class="panel-body">
        <?php if ($this->session->flashdata('place_updated_successful')): ?> 
            <p class='alert alert-dismissable alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                <?php echo $this->session->flashdata('place_updated_successful'); ?>
            </p>
		<?php elseif ($this->session->flashdata('place_updated_failed')): ?>
			<p class='alert alert-dismissable alert-danger'>";
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>";
			    <?php echo $this->session->flashdata('place_updated_failed'); ?>
			</p>
		<?php endif; ?>
        
        <?php if ($this->session->userdata('logged_in') && ($this->session->userdata('tenDangNhap') == $diaDiem_data['TenDangNhap'] || $this->session->userdata('maQH') == 0)): ?>
        <div class="btn-group pull-right">
            <a href=<?php echo base_url(uri_string().'/edit'); ?> class="btn btn-default t-btn-default">Chỉnh sửa thông tin</a>
            <a class="btn btn-default t-btn-default">Xóa địa điểm</a>
        </div>
        <?php endif; ?>

    	<div class="t-diadiem-name"><?php echo $diaDiem_data['TenDiaDiem']; ?></div>
        <div><b>Website</b>: <a href=<?php echo $diaDiem_data['Website']; ?>><?php echo $diaDiem_data['Website']; ?></a></div>
        <div><b>Email</b>: <a href=<?php echo 'mailto:'.$diaDiem_data['EmailDD']; ?>><?php echo $diaDiem_data['EmailDD']; ?></a></div>
        <div><b>Số điện thoại</b>: <a href=""><?php echo $diaDiem_data['SoDT']; ?></a></div>
        <div><b>Địa chỉ</b>: <?php echo $diaDiem_data['DiaChi']; ?></div>
        <div id="map" class="t-map"></div>
        <script>
        function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
    </div>
</div>