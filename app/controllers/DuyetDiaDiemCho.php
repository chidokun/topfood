<?php
class DuyetDiaDiemCho extends CI_Controller {
	public function index() {
		$data['main_content'] = 'duyetDiaDiemCho';
		$this->load->view('layouts/main',$data);
	}
}
?>