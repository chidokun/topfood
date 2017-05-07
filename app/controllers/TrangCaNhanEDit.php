<?php
class TrangCaNhanEDit extends CI_Controller {
	public function index() {
		$data["main_content"] = "trangCaNhanEDit";
		$this->load->view("layouts/main", $data);
	}
}
?>