<?php
class ThayDoiMatKhau extends CI_Controller {
	public function index() {
		$data["anhbia"] = "anhBia";
		$data["main_content"] = "thayDoiMatKhau";
		$this->load->view("layouts/main", $data);
	}
}
?>