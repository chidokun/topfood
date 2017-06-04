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
        $data['title'] = 'Duyệt địa điểm';
        //Hiển thị nội dung của địa điểm chờ duyệt
		$data['main_content'] = 'duyetDiaDiemCho';
        
		$this->load->view("layouts/main", $data);
	}
    /**
     * thực hiện duyệt các địa điểm đang chờ
     *
     * @param string $value
     * @return void
     */
    public function duyetDiaDiem($maDiaDiem){
        # code...
        // if(!$this->DiaDiemCho_model->updateTrangThai($_POST['maDiaDiem'])){
        //     echo "Duyệt thất bại";
        // }
        // else{
        //     echo "Duyệt thành công";
        // }
        if(!isset($_POST['submit'])){
            return;
        }
		    $updated = $this->DiaDiem_model->duyetDiaDiem($maDiaDiem);
			if ($updated) {
                $this->session->set_flashdata('duyet_update_successful', 'Duyệt địa điểm thành công.');
            } else {
                $this->session->set_flashdata('duyet_update_failed', 'Duyệt địa điểm không thành công.');
            }     
            redirect('duyetDiaDiemCho'); 
    }
}
?>