<?php
class TrangCaNhan extends CI_Controller {
	public function index() {
		$data["anhbia"] = "anhBia";
		$data["main_content"] = "trangCaNhan";
		$this->load->view("layouts/main", $data);
	}
}
?>