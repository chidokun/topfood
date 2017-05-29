<?php
class TaoDiaDiem extends CI_Controller {
	public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in'))
            redirect("DangNhap");
    }

	public function index() {
		$this->form_validation->set_rules('tenDiaDiem', 'Tên địa điểm', 'trim|required|max_length[100]|min_length[5]');
        $this->form_validation->set_rules('diaChi', 'Địa chỉ', 'trim|required|max_length[200]|min_length[6]');
        $this->form_validation->set_rules('soDT', 'Số điện thoại', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('emailDD', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('website', 'Website', 'trim|required');
        $this->form_validation->set_rules('moTaDD', 'Mô tả địa điểm', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data["main_content"] = "taoDiaDiem";
			$this->load->view("layouts/main", $data);
        } else {

			//upload avatar
			//$this->upload();

			//insert information
            $this->load->model('DiaDiem_model');
            $this->session->set_flashdata('place_created', 'Địa điểm được tạo thành công. Vui lòng chờ quản trị viên xét duyệt trong vòng 24h.');
            if ($this->DiaDiem_model->insert()) {
               redirect(base_url());
            }
        }
	}
}
?>