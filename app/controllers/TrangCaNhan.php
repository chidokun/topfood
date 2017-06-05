<?php
class TrangCaNhan extends CI_Controller {

	/**
	 * Hiển thị giao diện các đánh giá của người dùng
	 *
	 * @param string $tenDangNhap Tên đăng nhập
	 * @return void
	 */
	public function danhGia($tenDangNhap)
	{
		//Lấy thông tin người dùng
		$data['nguoiDung_data'] = $this ->NguoiDung_model->select($tenDangNhap);

		//Thêm tiêu đề
		$data['title'] = $data['nguoiDung_data']['TenNguoiDung'].' - Đánh giá';

		$data['danhGiaDiaDiem'] = $this->DanhGiaDiaDiem_model->selectAllDanhGiaNguoiDung($tenDangNhap);

		$data['danhGiaMonAn'] = $this->DanhGiaMonAn_model->selectAllDanhGiaNguoiDung($tenDangNhap);

		$data['layoutAnhBia'] = "layouts/trangCaNhan/anhBia";

		$data["layoutContent"] = "layouts/trangCaNhan/trangCaNhan-review";

		$data["main_content"] = "layouts/trangCaNhan";

		$this->load->view("layouts/main", $data);
	}

	/**
	 * Hiển thị giao diện các địa điểm của tôi
	 *
	 * @param string $tenDangNhap Tên đăng nhập
	 * @return void
	 */
	public function diaDiem($tenDangNhap)
	{
		//Lấy thông tin người dùng
		$data['nguoiDung_data'] = $this ->NguoiDung_model->select($tenDangNhap);

		//Thêm tiêu đề
		$data['title'] = $data['nguoiDung_data']['TenNguoiDung'].' - Đánh giá';

		$data['cacDiaDiem'] = $this->DiaDiem_model->selectAll($tenDangNhap);

		$data['layoutAnhBia'] = "layouts/trangCaNhan/anhBia";

		$data["layoutContent"] = "layouts/trangCaNhan/diaDiemCuaToi";

		$data["main_content"] = "layouts/trangCaNhan";

		$this->load->view("layouts/main", $data);
	}

	/**
	 * Hiển thị giao diện thông tin người dùng
	 *
	 * @param string $tenDangNhap Tên đăng nhập
	 * @return void
	 */
	public function info($tenDangNhap)
	{
		//Lấy thông tin người dùng
		$data['nguoiDung_data'] = $this ->NguoiDung_model->select($tenDangNhap);

		//Thêm tiêu đề
		$data['title'] = $data['nguoiDung_data']['TenNguoiDung'].' - Thông tin';

		$data['layoutAnhBia'] = "layouts/trangCaNhan/anhBia";

		$data["layoutContent"] = "layouts/trangCaNhan/trangCaNhan-info";

		$data["main_content"] = "layouts/trangCaNhan";

		$this->load->view("layouts/main", $data);
	}

	/**
	 * Hiển thị trang thay đổi thông tin người dùng
	 *
	 * @param string $tenDangNhap Tên đăng nhập
	 * @return void
	 */
	public function edit($tenDangNhap)
	{
		if (!$this->session->userdata('logged_in')) {
            redirect('dangNhap');
        }
		//Lấy thông tin người dùng
		$data['nguoiDung_data'] = $this ->NguoiDung_model->select($tenDangNhap);

		//Thêm tiêu đề
		$data['title'] = $data['nguoiDung_data']['TenNguoiDung'].' - Thay đổi thông tin';

		$data['layoutAnhBia'] = "layouts/trangCaNhan/anhBia";

		$data["layoutContent"] = "layouts/trangCaNhan/trangCaNhan-edit";

		$data["main_content"] = "layouts/trangCaNhan";

		$this->load->view("layouts/main", $data);
	}

	/**
	 * Hiển thị giao diện đổi mật khẩu
	 *
	 * @param string $tenDangNhap Tên đăng nhập
	 * @return void
	 */
	public function doiMatKhau($tenDangNhap)
	{
		if (!$this->session->userdata('logged_in')) {
            redirect('dangNhap');
        }

		//Lấy thông tin người dùng
		$data['nguoiDung_data'] = $this ->NguoiDung_model->select($tenDangNhap);

		//Thêm tiêu đề
		$data['title'] = $data['nguoiDung_data']['TenNguoiDung'].' - Thông tin';

		$data['layoutAnhBia'] = "layouts/trangCaNhan/anhBia";

		$data["layoutContent"] = "layouts/trangCaNhan/thayDoiMatKhau";

		$data["main_content"] = "layouts/trangCaNhan";

		$this->load->view("layouts/main", $data);
	}

	/**
	 * Xử lý cập nhật thông tin người dùng
	 *
	 * @param string $tenDangNhap Tên đăng nhập
	 * @return void
	 */
	public function updateThongTin($tenDangNhap)
	{
		if(!isset($_POST['submit'])){
            return;
        }

		$this->form_validation->set_rules('tenNguoiDung', 'Tên Người Dùng', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('gioiThieuBanThan', 'Giới thiệu bản thân', 'trim|required');

		if (!$this->form_validation->run()) 
		{
            $this->edit($tenDangNhap);
        } 
		else 
		{
			$updated = $this->NguoiDung_model->updateThongTin($tenDangNhap);
			if ($updated) {
                $this->session->set_flashdata('info_update_successful', 'Cập nhật thông tin thành công.');
            } else {
                $this->session->set_flashdata('info_update_failed', 'Cập nhật thông tin không thành công.');
            }     

            redirect('trangCaNhan/info/'.$tenDangNhap); 
		}
	}

	/**
	 * Xử lý đổi mật khẩu
	 *
	 * @param string $tenDangNhap Tên đăng nhập
	 * @return void
	 */
	public function updateMatKhau($tenDangNhap)
	{
		if(!isset($_POST['submit'])){
            return;
        }

		$this->form_validation->set_rules('matKhauCu', 'Mật khẩu cũ', 'required|min_length[6]');
		$this->form_validation->set_rules('matKhauMoi', 'Mật khẩu mới', 'required|min_length[6]');
		$this->form_validation->set_rules('nhapLaiMatKhau', 'Nhập lại mật khẩu', 'required|min_length[6]|matches[matKhauMoi]');

		if (!$this->form_validation->run()) 
		{
            $this->doiMatKhau($tenDangNhap);
        } 
		else 
		{
			$updated = $this->NguoiDung_model->updateMatKhau($tenDangNhap);
			if ($updated) {
                $this->session->set_flashdata('pass_update_successful', 'Cập nhật thông tin thành công.');
				redirect('trangCaNhan/info/'.$tenDangNhap); 
			} else {
                $this->session->set_flashdata('pass_update_failed', 'Cập nhật thông tin không thành công.');
				redirect('trangCaNhan/doiMatKhau/'.$tenDangNhap);
			}                
		}
	}
}
?>