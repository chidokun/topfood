<?php
class DangNhap extends CI_Controller {
	public function index() {
		$data['main_content'] = 'dangNhap';
		$this->load->view('layouts/main-register',$data);
	}
}
?>