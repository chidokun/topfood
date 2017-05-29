<?php
class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in'))
            redirect("DangNhap");
    }

	public function index() {
		
		$this->load->view("layouts/main");
	}
}
?>