<?php
class Home extends CI_Controller {

	public function index() {
		$data['diadiem_luotthichnhieunhat'] = 'layouts/trangChu/diaDiemThichNhieuNhat';
		$data['diadiem_moi'] = 'layouts/trangChu/diaDiemMoi';
		$data['review_moinhat'] = 'layouts/trangChu/reviewMoiNhat';
		$data['diadiem_dexuat'] = 'layouts/trangChu/diaDiemDeXuat';
		$data['monngon'] = 'layouts/trangChu/monNgon';
		$data['main_content'] = 'layouts/trangChu';
		$this->load->view("layouts/main",$data);
	}
}
?>