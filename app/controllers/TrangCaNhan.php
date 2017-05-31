<?php
class TrangCaNhan extends CI_Controller {
	public function index() {
		$data["trangCaNhan_anhBia"] = "layouts/trangCaNhan/anhBia";
		$data["trangCaNhan_content"] = "layouts/trangCaNhan/trangCaNhan-edit";
		$data["main_content"] = "layouts/trangCaNhan";
		$this->load->view("layouts/main", $data);
	}
}
?>