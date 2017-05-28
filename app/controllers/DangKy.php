<?php
class DangKy extends CI_Controller {
	public function index() {
		$this->form_validation->set_rules('tenDangNhap', 'Tên đăng nhập', 'trim|required|max_length[100]|min_length[2]|is_unique[NGUOIDUNG.TenDangNhap]');
		$this->form_validation->set_rules('matKhau', 'Mật khẩu', 'trim|required|max_length[50]|min_length[6]');
		$this->form_validation->set_rules('matKhauAgain', 'Mật khẩu nhập lại', 'trim|required|max_length[50]|min_length[6]|matches[matKhau]');
		$this->form_validation->set_rules('tenNguoiDung', 'Tên người dùng', 'trim|required|max_length[100]|min_length[10]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('gioiThieuBanThan', 'Giới thiệu bản thân', 'trim|required');

		if ($this->form_validation->run() == FALSE)
        {
           	$data['main_content'] = 'dangKy';
			$this->load->view('layouts/main-register',$data);
        }
        else
        {
            $this->load->model('NguoiDung_model');
			$this->session->set_flashdata('registered', 'Bạn đã đăng ký thành công. Giờ bạn có thể đăng nhập.');
			if($this->NguoiDung_model->insert()) {
				redirect('dangNhap');	
			}
        }
	}
}
?>