<div >
<!--Ảnh bìa và mô tả-->
  <div class="t-divanhbia">
    <div class="t-col-2 ">
      <img src="<?php echo base_url(); ?>/assets/images/db/user1.png " class="t-infoavatar">
    </div>
    <div class="t-col-7">
      <div class="t-header-infor">
        <span><b>@Vương đẹp trai nhất thế gian@</b></span><br>
      </div>
      <div class="t-body-infor">
        <span>Đẹp vạn người mê, soái nhất hành tinh</span><br>
        <span>Chuyên cmn gia các món ăn, ẩm thực lạ trên đời.</span><br>
      </div>
    </div>
    <div class="t-col-3">
      <div class="t-top"></div>
      <div>
        <button type="button" class="t-btn-moreinfor">Xem thông tin</button>
      </div>
    </div>
  </div>
<!--Ảnh bìa và mô tả-->
  <div class="t-wrapper">
    <p class="t-panel-header">Chỉnh sửa thông tin ngươi dùng</p>
    <div class="t-body">
      <div class="t-editinfor">
        <div class="form-group">
          <label for="usr">Tên người dùng</label>
          <input type="text" class="form-control" id="tenDangNhap">
        </div>
        <div class="form-group">
          <label for="password">Ngày sinh</label>
          <input type="date" class="form-control" id="ngaySinh">
        </div>
        <div class="form-group">
          <label>Giới tính</label>
          <div class="btn-group btn-group-justified">
            <a href="#" class="btn btn-default t-btn-default">Nam</a>
            <a href="#" class="btn btn-default">Nữ</a>
            <a href="#" class="btn btn-default">Khác</a>
          </div>
        </div>
        <div class="form-group">
          <label for="tenNguoiDung">Email</label>
          <input type="text" class="form-control" id="tenNguoiDung">
        </div>
        <div class="form-group">
          <label for="tenNguoiDung">Giới thiệu bản thân</label>
          <textarea class="form-control" rows="5" id="introduce"></textarea>
        </div>
      </div>
    </div>
    <div class="t-div-btntaodiadiem ">
      <button type="button" class="btn btn-default t-btn-default">Lưu</button>
      <button type="button" class="btn btn-default t-btn">Hủy bỏ</button>
    </div>
  </div>
</div>