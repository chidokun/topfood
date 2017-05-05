<div class="t-wrapper">
  <p class="t-panel-header">Tạo địa điểm mới</p>
  <div class="t-body row">
    <div class="col-md-3">
    		<div class="t-avatar">
          <img src="<?php echo base_url(); ?>/assets/images/app/Picture.png" class="t-imgavatar">
        </div>
    		<p class="t-lbavatar"><i>Nhấn để thêm ảnh đại diện</i></p>
    </div>
    <div class="col-md-9 t-col-9">
      <div class="col-md-6">
      <!--Tên địa điểm-->
        <div class="form-group ">
          <label for="usr">Tên địa điểm:</label>
          <input type="text" class="form-control" id="usr" placeholder="Không quá 100 ký tự">
        </div>
      <!--Địac chỉ-->
        <div class="form-group">
            <label for="usr">Địa chỉ:</label>
            <input type="text" class="form-control" id="usr">
        </div>
      <!--SDT-->
        <div class="form-group">
                <label for="usr">Số điện thoại:</label>
                <input type="text" class="form-control" id="usr">
        </div>
      <!--Email-->  
        <div class="form-group">
                <label for="usr">Email:</label>
                <input type="text" class="form-control" id="usr">
        </div>
      <!--Website--> 
        <div class="form-group">
                <label for="usr">Website:</label>
                <input type="text" class="form-control" id="usr">
        </div>
      <!--Giờ đóng mở cửa--> 
        <div class="row">
          <div class="col-md-6 form-group t-gio">
            <label for="usr">Giờ mở cửa:</label>
            <input type="text" class="form-control" id="usr" placeholder="hh:mm">
          </div>
          <div class="col-md-6 form-group t-gio">
            <label for="usr">Giờ đóng cửa:</label>
            <input type="text" class="form-control" id="usr" placeholder="hh:mm">
          </div>
        </div>
      <!--Comment--> 
        <div class="form-group">
          <label for="comment">Comment:</label>
          <textarea class="form-control" rows="5" id="comment"></textarea>
        </div> 
      </div>
      <!--Danh mục hình ảnh-->
      <div class="col-md-6">
        <label class="t-danhmuchinhanh">Danh mục hình ảnh</label>
        <div class="t-listimg">
            <img src="<?php echo base_url(); ?>/assets/images/app/Picture.png" class="t-imgavatar"></div>
        </div>
      </div>
    </div>
    <!--Button-->
    <div class="t-div-btntaodiadiem ">
      <button type="button" class="btn btn-default t-btn-default">Tạo địa điểm</button>
      <button type="button" class="btn btn-default t-btn">Đặt lại</button>
    </div>
  </div>
</div>