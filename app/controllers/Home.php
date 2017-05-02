<?php
class Home extends CI_Controller {
	public function index() {
		$this->load->view("home");
	}
	public function index1() {
		$this->load->view("duyetDiaDiemCho");
	}
	public function index2() {
		$this->load->view("taoDiaDiem");
	}
	public function index3() {
		$this->load->view("timKiem");
	}
	
}
?>