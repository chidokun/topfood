<?php
class TimKiem extends CI_Controller {
	public function index() {
		$data['main_content'] = 'timKiem';
		$this->load->view('layouts/main',$data);
	}
}
?>