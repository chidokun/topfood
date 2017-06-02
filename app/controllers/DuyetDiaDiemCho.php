<?php
class DuyetDiaDiemCho extends CI_Controller {

	/**
     * Lấy thông tin địa điểm đang chờ duyệt
     *
     * @return void
     */
	public function index() {
        # code...
        // lấy thông tin địa điểm đang chờ
        $data['cacDiaDiemCho'] = $this->DiaDiem_model->selectDiaDiemCho();

        //Hiển thị nội dung của địa điểm chờ duyệt

		$data['main_content'] = 'duyetDiaDiemCho';
        
		$this->load->view("layouts/main", $data);
	}


}
?>
