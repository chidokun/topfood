<?php
class Home extends CI_Controller {

	public function index() {
		$data['main_content'] = 'layouts/trangChu';
		$this->load->view("layouts/main");
	}
}
?>