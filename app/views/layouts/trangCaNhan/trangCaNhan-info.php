 <?php if ($this->session->flashdata('info_update_successful')): ?> 
    <p class='alert alert-dismissable alert-success'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
        <?php echo $this->session->flashdata('info_update_successful'); ?>
    </p>
<?php elseif ($this->session->flashdata('info_update_failed')): ?>
    <p class='alert alert-dismissable alert-danger'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
        <?php echo $this->session->flashdata('info_update_failed'); ?>
    </p>
<?php endif; ?>

<?php if ($this->session->flashdata('pass_update_successful')): ?> 
    <p class='alert alert-dismissable alert-success'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
        <?php echo $this->session->flashdata('pass_update_successful'); ?>
    </p>
<?php elseif ($this->session->flashdata('pass_update_failed')): ?>
    <p class='alert alert-dismissable alert-danger'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
        <?php echo $this->session->flashdata('pass_update_failed'); ?>
    </p>
<?php endif; ?>
 
  <div class="panel panel-default">
    <div class="panel-heading t-panel-header">Thông tin ngươi dùng</div>

    <div class="t-body">

      <div class=" t-top">
        <div class="t-bottom t-panel-info"><?php echo $nguoiDung_data['TenNguoiDung']; ?></div>

        <div class="t-top">

          <table>
            <tr>
              <td>Tên đăng nhập</td>
              <td><?php echo $nguoiDung_data['TenDangNhap']; ?></td>
            </tr>
            <tr>
              <td>Giới tính</td>
              <td><?php echo $nguoiDung_data['GioiTinh']; ?></td>
            </tr>
            <tr>
              <td>Ngày sinh</td>
              <td><?php echo date_format(date_create($nguoiDung_data['NgaySinh']),'d/m/Y'); ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><a href="<?php echo 'mailto:'.$nguoiDung_data['Email']; ?>"><?php echo $nguoiDung_data['Email']; ?></a></td>
            </tr>
          </table>

        </div>

      </div>

    </div>

    <div class="t-divbtntrangcanhan">
      <a href=" <?php echo base_url('trangCaNhan/edit/'.$nguoiDung_data['TenDangNhap'] ); ?>" class="btn t-btn-default btn-default t-btn-editinfor">Chỉnh sửa thông tin</a>
      <a href=" <?php echo base_url('trangCaNhan/doiMatKhau/'.$nguoiDung_data['TenDangNhap'] ); ?>" class="btn t-btn-resetpassword">Đổi mật khẩu</a>
    </div>
  </div>
  </div>
  <!--dong trag ca nhan-->