
<div class="panel panel-default">
     <div class="panel-heading t-panel-header">Duyệt các địa điểm chờ</div>
     <div class="panel-body">
    <?php if ($this->session->flashdata('duyet_update_successful')): ?> 
        <p class='alert alert-dismissable alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
            <?php echo $this->session->flashdata('duyet_update_successful'); ?>
        </p>
    <?php elseif ($this->session->flashdata('duyet_update_failed')): ?>
        <p class='alert alert-dismissable alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
            <?php echo $this->session->flashdata('duyet_update_failed'); ?>
        </p>
    <?php endif; ?>

    <?php foreach ($cacDiaDiemCho as  $diaDiemCho) : ?>
    <!--Tạo địa điểm chờ 1-->
        <?php echo validation_errors("<p class='alert alert-dismissable alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"); ?>
        <?php echo form_open('duyetDiaDiemCho/duyetDiaDiem/'.$diaDiemCho['MaDiaDiem']); ?>
    
        <div class="t-diadiemcho">
            <div class="col-md-8">
                <div class="row" style="height:140px">
                    <div  style="width:140px; float:left">
                        <img src="<?php echo base_url('assets/images/db/'.$diaDiemCho['AnhDaiDienDD'] ); ?>" class="t-imgdiadiemcho">
                    </div>
                    <div style="float:left;padding-left:140px; height:100%">
                        <div class="t-infodiadiemcho" >
                            <div style="font-size: 18px; font-weight: bold;"><a href="<?php echo base_url('diaDiem/cacDanhGia/'.$diaDiemCho['MaDiaDiem']); ?>"><?php echo $diaDiemCho['TenDiaDiem'] ; ?></a></div>
                            <div><i><?php echo $diaDiemCho['MoTaDD'] ; ?></i></div>
                            <div><?php echo $diaDiemCho['DiaChi'] ; ?></div>
                            <div>
                                Mở cửa từ <b><?php echo date('H:i',strtotime($diaDiemCho['GioMoCua'])).' - '.date('H:i',strtotime($diaDiemCho['GioDongCua'])); ?></b>
                            </div>
                            <?php $gia = $this->DiaDiem_model->selectGia($diaDiemCho['MaDiaDiem']); ?>
                            <div style="color: #890606; font-weight: bold;"><?php echo number_format($gia['Min'],0,',','.').'đ';?> - <?php echo number_format($gia['Max'],0,',','.').'đ';?></div>
                            <div class="t-telephone"><?php echo $diaDiemCho['SoDT'] ; ?></div>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <?php $thongTinNguoiDung = $this->NguoiDung_model->select($diaDiemCho['TenDangNhap']);?>
                    <a href="<?php echo base_url('trangCaNhan/danhGia/'.$thongTinNguoiDung['TenDangNhap'] ); ?>">
                        <img src="<?php echo base_url('assets/images/db/'.$thongTinNguoiDung['AnhDaiDien'] ); ?>" class="t-user">
                    </a>
                    <div style="padding-top: 17px;">
                        <a href="<?php echo base_url('trangCaNhan/danhGia/'.$thongTinNguoiDung['TenDangNhap'] ); ?>" class="t-username" style="font-weight: bold;"><?php echo $thongTinNguoiDung['TenNguoiDung'] ; ?></a> đã tạo địa điểm này.
                    </div>
                </div>
            </div>
            <!--Button-->
            <div class="col-md-4">
                <div class="t-btndiadiemcho">
                    <button type="submit" class="btn btn-default t-btn-default submit"  name="submit" value="<?php echo $diaDiemCho['MaDiaDiem']; ?>">Duyệt ngay</button>
                    <a href="<?php echo base_url('diaDiem/delete/'.$diaDiemCho['MaDiaDiem']); ?>" class="btn btn-default t-btn">Xóa địa điểm</a>
                </div>
            </div>
        </div>
    
    <?php echo form_close(); ?>
    <!--Tạo địa điểm chờ 1-->
    <?php endforeach; ?>
    </div>
</div>
<!-- nội dung -->