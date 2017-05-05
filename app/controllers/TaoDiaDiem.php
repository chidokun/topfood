<?php
class TaoDiaDiem extends CI_Controller {
	public function index() {
		$data["main_content"] = "taoDiaDiem";
		$this->load->view("layouts/main", $data);
	}
}
?>