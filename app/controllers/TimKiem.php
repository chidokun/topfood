<?php
class TimKiem extends CI_Controller {
	public function index() {
		$type = $_POST["timkiem"];
		if(isset($_POST['searchbtn']) && $_POST["timkiem"]=='place') {
		
			$this->diaDiem($_POST["search"]);
		}
		elseif(isset($_POST['searchbtn']) && $_POST["timkiem"]=='user') {
		
			$this->nguoiDung($_POST["search"]);
		}
		elseif(isset($_POST['searchbtn']) && $_POST["timkiem"]=='food') {
		
			$this->monAn($_POST["search"]);
		}
	}
	/**
	 * Tìm kiếm địa điểm
	 *
	 * @param array $_POST
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
	 * @param array $_POST
	 * @return void
	 */
	public function nguoiDung($noiDung)
	{
		$data['ketQua'] = $this->NguoiDung_model->timKiem($noiDung);
		$data['noiDung'] = $noiDung;
		$data['title'] = 'Tìm kiếmngười dùng cho '.$noiDung;
		$data["main_content"] = "timKiem";
		$this->load->view("layouts/main", $data);
	}

	/**
	 * Tìm kiếm món ăn
	 *
	 * @param array $_POST
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