<div >
  <p class="panel-heading t-panel-header t-padding-panel" style=" border-bottom: 4px solid orange">Đánh giá địa điểm mới nhất</p>
  <div>
      <!--Nhóm bài Review 1-->
      <div class=" t-group-review" style=" width:750px;">
          <?php foreach ($danhgiamoi_data as  $danhGia) : ?>
          <!--Review 1-->
          <a  href="<?php echo base_url('diaDiem/cacDanhGia/'.$danhGia['MaDiaDiem'].'/'.$danhGia['MaDGDD'] ); ?>">
            <div style="padding:1px;width:32%;height:100%; float:left;border:1px solid #dddddd; margin-top:25px; margin-right:10px">
            <div style="height:236px;width:100% ">
              <img src="<?php echo base_url('assets/images/db/'.($this->DiaDiem_model->select($danhGia['MaDiaDiem']))['AnhDaiDienDD']); ?>" alt="Địa điểm đề xuất" style="height:100%; width:100%" >
            </div >

            <!--Tên địa điểm và điểm số-->
            <div  class="t-catchuoi t-content-score-name-review">
              <div style="width:100%;height:30%">

                  <div class="col-md-2" style="padding:3px ; ">
                    <div class="t-danhgia-diem " style="margin: 5px 0px 5px 5px;">
                      <div><?php echo number_format(($this->DiaDiem_model->select($danhGia['MaDiaDiem']))['DiemTrungBinhDD'],1); ?></div>
                    </div>
                  </div>

                  <div class="col-md-10" style="padding:9px 10px ; ">
                    <div class="t-catchuoi t-content-name-review "><?php echo ($this->DiaDiem_model->select($danhGia['MaDiaDiem']))['TenDiaDiem']; ?></div>
                    <div class="t-catchuoi t-content-address-review" ><span class="glyphicon glyphicon-home" ></span> <?php echo ($this->DiaDiem_model->select($danhGia['MaDiaDiem']))['DiaChi']; ?></div>                  
                  </div>

              </div>
            </div>

              <!--Thông tin review-->
            <div  class="t-catchuoidiadiemlike t-content-info-body-reiew">
              <div style="width:100%; height:30%">

                <div class="col-md-2" style="padding:3px ;">
                      <?php $img = $this->NguoiDung_model->select($danhGia['TenDangNhap'])['AnhDaiDien'] ;?>
                      <img src="<?php echo  $img ? base_url('assets/images/db/'.$img) : base_url('assets/images/app/user.jpg') ; ?>" alt="avartar" style="width:40px; height:40px;border-radius: 50%;margin:15px 7px 10px 7px">
                </div>

                <div class="col-md-10" style="padding:20px 18px 10px 18px; ">
                  <div  class="t-content-info-review ">
                      <em style="width:100%" class="t-catchuoidiadiemlike"><?php echo $danhGia['BaiNhanXetDGDD']; ?></em>
                  </div> 
                </div>

              </div>
            </div>
            
            </div>
          </a>
          <?php endforeach; ?>
          <!--/Review 1-->
          </div>     
      </div>
      <div class="t-pagination"><?php echo $paginator; ?></div>
</div>