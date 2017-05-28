<?php
class MonAn extends CI_Controller {
	public function index() {
		$data['main_content'] = 'layouts/monAn';
		$data['monAn_info'] = 'layouts/monAn/monAn-info';
		$data['monAn_bangDanhGia'] = 'layouts/monAn/monAn-bangDanhGia';
		$data['monAn_cacDanhGia'] = 'layouts/diaDiem/danhGia-cacDanhGia';
		$data['main_monAn_content'] = 'layouts/monAn/monAn-page';
		$data['monAn_suaDanhGia'] = 'layouts/monAn/suaDanhGia';
		$data['main_monAn_suaDanhGia'] = 'layouts/monAn/suaDanhGiaMonAn-page';
		$data['main_monAn_suaMonAn'] = 'layouts/monAn/suaMonAn';
		$this->load->view('layouts/main',$data);
	}
}
?>