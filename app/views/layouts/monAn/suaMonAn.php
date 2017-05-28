<div class="t-wrapper">
	<div class="t-panel-header">Chỉnh sửa thông tin món ăn</div>
	<div class="t-body">
		<div class="col-md-5 ">
			<label>Ảnh đại diện</label>
	    	<div class="t-imgsuamonan ">
	    		<img src="<?php echo base_url(); ?>/assets/images/app/Picture.png" class="t-imgavatar">
	    	</div>
	    </div>
	    <div class="col-md-7">
	    	<div class="form-group " style="margin-top: 20px">
	          <label for="usr">Tên món ăn:</label>
	          <input type="text" class="form-control" id="tenmonan" placeholder="Không quá 100 ký tự" style="width:80%">
	        </div>

	        <div class="form-group " style="margin-top: 20px">
	          <label for="usr">Giá cả:</label>
	          <input type="text" class="form-control" id="giaca" placeholder="" style="width:80%">
	        </div>

		    <div class="form-group">
	  			<label>Loại món ăn</label>
		  		<div class="btn-group btn-group-justified" style="width: 80%">
				  	<a href="#" class="btn btn-default t-btn-default">Món ăn</a>
				  	<a href="#" class="btn btn-default">Thức uống</a>
				</div>
			</div>

			<div class="form-group">
          		<label for="comment">Mô tả món ăn:</label>
          		<textarea class="form-control" rows="5" id="motamonan" style="width: 80%"></textarea>
        	</div>

        	<!--Button-->
		    <div class="t-body">
				<div class="col-md-8"></div>
				<div class="col-md-4">
		    		<div class="t-btndiadiemcho">
		    			<button type="button" class="btn btn-default t-btn-default">Lưu món ăn</button>
		    		</div>
		    	</div>
			</div>
		</div>
	</div>
</div>