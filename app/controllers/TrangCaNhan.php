<?php
class TrangCaNhan extends CI_Controller {
	public function index() {;
		$data["main_content"] = "layouts/trangCaNhan";
		$this->load->view("layouts/main", $data);
	}
}
?>