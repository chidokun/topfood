<?php
class TimKiem extends CI_Controller {
	public function index() {
		$type = $_GET["timkiem"];
		if(isset($_GET['searchbtn']) && $_GET["timkiem"]=='place') {
		
			$this->diaDiem($_GET["search"]);
		}
		elseif(isset($_GET['searchbtn']) && $_GET["timkiem"]=='user') {
		
			$this->nguoiDung($_GET["search"]);
		}
		elseif(isset($_GET['searchbtn']) && $_GET["timkiem"]=='food') {
		
			$this->monAn($_GET["search"]);
		}
	}
	/**
	 * Tìm kiếm địa điểm
	 *
	 * @param array $_GET
	 * @return void
	 */
	public function diaDiem($noiDung)
	{
		$data['ketQua'] = $this->DiaDiem_model->timKiem($noiDung);
		$data['noiDung'] = $noiDung;
		$data['title'] = 'Tìm kiếm địa điểm cho '.$noiDung;
		$data["main_content"] = "timKiem";
		$this->load->view("layouts/main", $data);
	}

	/**
	 * Tìm kiếm người dùng
	 *
	 * @param array $_GET
	 * @return void
	 */
	public function nguoiDung($noiDung)
	{
		$data['ketQua'] = $this->NguoiDung_model->timKiem($noiDung);
		$data['noiDung'] = $noiDung;
		$data['title'] = 'Tìm kiếm người dùng cho '.$noiDung;
		$data["main_content"] = "timKiem";
		$this->load->view("layouts/main", $data);
	}

	/**
	 * Tìm kiếm món ăn
	 *
	 * @param array $_GET
	 * @return void
	 */
	public function monAn($noiDung)
	{
		$data['ketQua'] = $this->MonAn_model->timKiem($noiDung);
		$data['noiDung'] = $noiDung;
		$data['title'] = 'Tìm kiếm món ăn cho '.$noiDung;
		$data["main_content"] = "timKiem";
		$this->load->view("layouts/main", $data);
	}
}
?>