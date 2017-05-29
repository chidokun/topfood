<?php
class MonAn extends CI_Controller {
	public function index() {
		$data['main_content'] = 'layouts/monAn';
		$data['monAn_info'] = 'layouts/monAn/monAn-info';
		$data['monAn_bangDanhGia'] = 'layouts/monAn/monAn-bangDanhGia';
		$data['monAn_cacDanhGia'] = 'layouts/diaDiem/danhGia-cacDanhGia';
		$data['main_monAn_dsBaiDanhGiaMonAn'] = 'layouts/monAn/monAn-page';
		$data['main_monAn_suaMonAn'] = 'layouts/monAn/suaMonAn';
		$data['monAn_vietDanhGiaMonAn'] = 'layouts/monAn/vietDanhGiaMonAn';
		$data['main_monAn_vietDanhGiaMonAn'] = 'layouts/monAn/vietDanhGiaMonAn-page';
		$data['monAn_suaDanhGiaMonAn'] = 'layouts/monAn/suaDanhGiaMonAN';
		$data['main_monAn_suaDanhGiaMonAn'] = 'layouts/monAn/suaDanhGiaMonAn-page';
		$this->load->view('layouts/main',$data);
	}
}
?>