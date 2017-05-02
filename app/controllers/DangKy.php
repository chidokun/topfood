<?php
class DangKy extends CI_Controller {
	public function index() {
		$data['main_content'] = 'dangKy';
		$this->load->view('layouts/main-register',$data);
	}
}
?>