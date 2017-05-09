<?php
class DiaDiem extends CI_Controller {
	public function index() {
		$data['main_content'] = 'layouts/diaDiem';
		$data['diaDiem_info'] = 'layouts/diaDiem/info';
		$data['diaDiem_bangDanhGia'] = 'layouts/diaDiem/danhGia-bangDanhGia';
		$data['diaDiem_cacDanhGia'] = 'layouts/diaDiem/danhGia-cacDanhGia';
		$data['main_diaDiem_content'] = 'layouts/diaDiem/danhGia-page';
		$this->load->view('layouts/main',$data);
	}
}
?>