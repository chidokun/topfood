<?php
class ThayDoiMatKhau extends CI_Controller {
	public function index() {
		$data["main_content"] = "thayDoiMatKhau";
		$this->load->view("layouts/main", $data);
	}
}
?>