
	<!--Ảnh bìa và mô tả-->
  <div class="t-divanhbia">
    <div class="t-col-2 ">
      <img src="<?php echo base_url('assets/images/db/'.$nguoiDung_data['AnhDaiDien'] ); ?>" class="t-infoavatar">
    </div>
    <div class="t-col-7">
      <div class="t-header-info">
        <?php echo $nguoiDung_data['TenNguoiDung']; ?>
      </div>
      <div class="t-body-infor">
        <?php echo $nguoiDung_data['GioiThieuBanThan']; ?>
      </div>
    </div>
    <div class="t-col-3">
      <div class="t-top"></div>
      <div style="padding-right: 10px">
        <a href="<?php echo base_url('trangCaNhan/info/'.$nguoiDung_data['TenDangNhap'] ); ?>" class="btn t-btn-default t-btn-default-transparent btn-default pull-right">Xem thông tin</a>
      </div>
  </div>
<!--Ảnh bìa và mô tả-->
