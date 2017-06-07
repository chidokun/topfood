<div class="panel panel-default">
    <div class="panel-heading t-panel-header t-border-panel" style="border-bottom:4px solid orange">Top review ưa thích nhất</div>
    <div class="panel-body " style="padding:0px 7px; border:none">
        <?php $color =array('red', 'orange', 'green', 'black','blue');$stt=0;foreach ($topreview_data as  $danhgia) : ?>
        <!--STT-->
        <div style="height:103px; border-bottom:1px solid #dddddd">
            <a href="<?php echo base_url('dangKy'); ?>" >
                <div class="col-md-2" style="padding:25px 14px;">
                    <div style="color:<?php echo $color["$stt"] ; ?>" class="t-STT-top"><?php $stt++; echo $stt; ?></div>
                </div>
                <div  class="col-md-10" style="padding:10px 0px">
                    <!--Hình ảnh-->
                    <div  class="t-body-img">
                        <img src="<?php echo base_url('assets/images/db/'.($this->DiaDiem_model->select($danhgia['MaDiaDiem']))['AnhDaiDienDD'] ); ?>" alt="top1" style="width:100%;height:90%; padding-top:5px; border: 1px solid #dddddd">
                    </div>
                    <!--Thông tin-->
                    <div class="t-div-body-infor" >
                        <div class="t-diadiem-info-panel-left" style="width:99%;display: block">
                            <div class="t-name-div-body-infor "><?php echo $danhgia['TieuDeDGDD'] ; ?></div>
                                <div  class=" t-content-div-body-infor"><em  class="t-catchuoidiadiemlike"><?php echo $danhgia['BaiNhanXetDGDD'] ; ?></em>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>