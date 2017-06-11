<?php
class MonAn extends CI_Controller {

	/**
     * Hiển thị trang Đánh giá của một món ăn
     * 
     * @param int $maDiaDiem Mã món ăn
     * @return void
     */
    public function cacDanhGia($maMonAn)
    {
        // lấy thông tin món ăn 
        $data['monAn'] = $this->MonAn_model->select($maMonAn);

        if (count($data['monAn']) == 0)
            redirect('dieuHuong/not_found');

        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($data['monAn']['MaDiaDiem']);

         // đặt tiêu đề
        $data['title'] = $data['monAn']['TenMonAn'].' tại '.$data['diaDiem_data']['TenDiaDiem'];
        
        // trường hợp tất cả đánh giá
        if (!$this->uri->rsegment(4)) {
            // lấy bảng đánh giá
            $data['bangDanhGia_data'] = $this->DanhGiaMonAn_model->selectBangDanhGia($maMonAn);
            $data['tongDanhGia'] = $this->DanhGiaMonAn_model->selectTongDanhGia($maMonAn);
            $data['tongBinhLuan'] = $this->DanhGiaMonAn_model->selectTongBinhLuan($maMonAn);
            
            // lấy danh sách đánh giá
            $data['cacDanhGia'] = $this->DanhGiaMonAn_model->selectAllDanhGia($maMonAn);

            // nội dung bên trái là các đánh giá
            $data['layoutDanhGia'] = 'layouts/diaDiem/monAn/danhGia/cacDanhGia';

            // nội dung bên phải là bảng đánh giá
            $data['layoutBangDanhGia'] = 'layouts/diaDiem/monAn/danhGia/bangDanhGiaChung';
        }
        //trường hợp chỉ 1 đánh giá
        else {
            $data['danhGia'] = $this->DanhGiaMonAn_model->selectDanhGia($this->uri->rsegment(4));
            
            if (!isset($data['danhGia']) || $data['danhGia']['MaMonAn'] != $maMonAn) {
                //đánh giá ko có hoặc k thuộc về món ăn, điều hướng thông báo lỗi
            }

            //load các bình luận ..
            $data['cacBinhLuan'] = $this->BinhLuanMA_model->selectAllBinhLuan($data['danhGia']['MaDGMA']);

            // nội dung bên trái là đánh giá
            $data['layoutDanhGia'] = 'layouts/diaDiem/monAn/danhGia/danhGiaItem';

            // nội dung bên phải là bảng đánh giá
            $data['layoutBangDanhGia'] = 'layouts/diaDiem/monAn/danhGia/bangDanhGia';
        }

        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/monAn/info';

        // nội dung chính menu là đánh giá
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/monAn/danhGia-page';
        
        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

	/**
     * Hiển thị trang Tạo món ăn cho một địa điểm
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return void
     */
    public function taoMonAn($maDiaDiem) {
        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

        if (count($data['diaDiem_data']) == 0)
            redirect('dieuHuong/not_found');

         // đặt tiêu đề
        $data['title'] = 'Tạo món ăn cho '.$data['diaDiem_data']['TenDiaDiem'];

        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/info';

        // nội dung chính menu là hình ảnh
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/taoMonAn-page';

        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    /**
     * Hiển thị trang hình ảnh của món ăn
     *
     * @param int $maMonAn Mã món ăn
     * @return void
     */
    public function hinhAnh($maMonAn) {
        // lấy thông tin món ăn 
        $data['monAn'] = $this->MonAn_model->select($maMonAn);

        if (count($data['monAn']) == 0)
            redirect('dieuHuong/not_found');

        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($data['monAn']['MaDiaDiem']);

         // đặt tiêu đề
        $data['title'] = 'Hình ảnh của '.$data['monAn']['TenMonAn'].' tại '.$data['diaDiem_data']['TenDiaDiem'];
        
        //lấy danh sách hình ảnh
        $data['listImg'] = $this->MonAn_model->selectImages($maMonAn);

        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/monAn/info';

        // nội dung chính menu là hình ảnh
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/monAn/hinhAnh-page';

        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    /**
     * Hiển thị trang Sửa món ăn cho một địa điểm
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return void
     */
    public function suaMonAn($maMonAn) {
        // lấy thông tin món ăn 
        $data['monAn'] = $this->MonAn_model->select($maMonAn);

        if (count($data['monAn']) == 0)
            redirect('dieuHuong/not_found');

        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($data['monAn']['MaDiaDiem']);

         // đặt tiêu đề
        $data['title'] = $data['monAn']['TenMonAn'].' tại '.$data['diaDiem_data']['TenDiaDiem'];
 
        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/monAn/info';

        // nội dung chính menu là hình ảnh
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/monAn/suaMonAn-page';

        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    /**
     * Xử lý kiểm tra và cập nhật thông tin món ăn. Điều hướng tới trang Các đánh giá món ăn sau khi thực hiện xong.
     *
     * @param int $maDiaDiem Mã món ăn
     * @return void
     */
    public function updateMonAn($maMonAn)
    {
        $this->form_validation->set_rules('tenMonAn', 'Tên món ăn', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('giaCaMA', 'Giá cả', 'trim|required');
        $this->form_validation->set_rules('moTaMA', 'Mô tả', 'trim|required');

        if (!$this->form_validation->run()) {
            $this->suaMonAn($maMonAn);
        } else {
            //update information
            if ($this->MonAn_model->update($maMonAn)) {
                $this->session->set_flashdata('food_updated_successful', 'Thông tin đã được cập nhật.');
            } else {
                $this->session->set_flashdata('food_updated_failed', 'Cập nhật không thành công.');
            }

            redirect('monAn/cacDanhGia/'.$maMonAn);
        }
    }


	/**
     * Hiển thị trang Viết đánh giá
     *
     * @param int $maMonAn Mã món ăn
     * @return void
     */
    public function vietDanhGia($maMonAn)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('dangNhap');
        }

        // lấy thông tin món ăn 
        $data['monAn'] = $this->MonAn_model->select($maMonAn);

        if (count($data['monAn']) == 0)
            redirect('dieuHuong/not_found');

        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($data['monAn']['MaDiaDiem']);

         // đặt tiêu đề
        $data['title'] = $data['monAn']['TenMonAn'].' tại '.$data['diaDiem_data']['TenDiaDiem'];
 
        // lấy bảng đánh giá
		$data['bangDanhGia_data'] = $this->DanhGiaMonAn_model->selectBangDanhGia($maMonAn);
		$data['tongDanhGia'] = $this->DanhGiaMonAn_model->selectTongDanhGia($maMonAn);
		$data['tongBinhLuan'] = $this->DanhGiaMonAn_model->selectTongBinhLuan($maMonAn);

        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin món ăn của địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/monAn/info';

        // nội dung chính menu là thực đơn
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/monAn/danhGia-page';

        // nội dung bên trái là đánh giá
        $data['layoutDanhGia'] = 'layouts/diaDiem/monAn/danhGia/vietDanhGia';

        // nội dung bên phải là bảng đánh giá
        $data['layoutBangDanhGia'] = 'layouts/diaDiem/monAn/danhGia/bangDanhGiaChung';
        
        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    /**
     * Xử lý thêm món ăn của một địa điểm
     *
     * @param string $maDiaDiem
     * @return void
     */
    public function insertMonAn($maDiaDiem) {
        if(!isset($_POST['submit'])){
            return;
        }

        $this->form_validation->set_rules('tenMonAn', 'Tên món ăn', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('giaCaMA', 'Giá cả', 'trim|required');
        $this->form_validation->set_rules('moTaMA', 'Mô tả', 'trim|required');

        if (!$this->form_validation->run()) {
            $this->taoMonAn($maDiaDiem);
        } else {
            $inserted = $this->MonAn_model->insert($maDiaDiem);
            
            if ($inserted) {
                $this->session->set_flashdata('food_created', 'Món ăn đã được tạo thành công.');
                
                //upload avatar
                if (!$_FILES['anhDaiDienMA']['size'] == 0 && $_FILES['anhDaiDienMA']['error'] == 0) {
                     $this->uploadAvatarMonAn($inserted);
                     $this->MonAn_model->updateAvatar($inserted);
                }

                //upload danh mục hình
                $uploaded = $this->uploadImagesMonAn($inserted);
                $this->MonAn_model->insertImages($uploaded, $inserted);

                //điều hướng tới trang món ăn
                redirect('monAn/cacDanhGia/'.$inserted);
            } else {
                $this->session->set_flashdata('review_insert_failed', 'Cập nhật không thành công.');
            }           
        }
    }

    /**
     * Upload ảnh đại diện món ăn
     *
     * @param string $maMonAn Mã món ăn
     * @return void
     */
    public function uploadAvatarMonAn($id) {
        $config['upload_path']          = './assets/images/db';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['file_name']            = "ma_avatar_".$id;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('anhDaiDienMA')) {
            $this->session->set_flashdata('upload_error', $this->upload->display_errors());
        }
             
        $_POST['anhDaiDienMA'] = $this->upload->data('file_name');
    }

    /**
     * Upload danh mục hình ảnh cho món ăn
     *
     * @param string $id Khóa chính của món ăn
     * @return array $uploaded Mảng các tên file đã được upload
     */
    public function uploadImagesMonAn($id)
    {
        $this->load->library('upload');
        $n = count($_FILES['danhMucHinhAnh']['name']);
        $uploaded = array();

        // clone các file đã gửi để upload
        for ($i = 0; $i < $n; $i++) {
            $_FILES['temp']['name'][$i]     = $_FILES['danhMucHinhAnh']['name'][$i];
            $_FILES['temp']['type'][$i]     = $_FILES['danhMucHinhAnh']['type'][$i];
            $_FILES['temp']['tmp_name'][$i] = $_FILES['danhMucHinhAnh']['tmp_name'][$i];
            $_FILES['temp']['error'][$i]    = $_FILES['danhMucHinhAnh']['error'][$i];
            $_FILES['temp']['size'][$i]     = $_FILES['danhMucHinhAnh']['size'][$i];
        }
        // Faking upload calls to $_FILE
        for ($i = 0; $i < $n; $i++) {
            $_FILES['danhMucHinhAnh']['name']     = $_FILES['temp']['name'][$i];
            $_FILES['danhMucHinhAnh']['type']     = $_FILES['temp']['type'][$i];
            $_FILES['danhMucHinhAnh']['tmp_name'] = $_FILES['temp']['tmp_name'][$i];
            $_FILES['danhMucHinhAnh']['error']    = $_FILES['temp']['error'][$i];
            $_FILES['danhMucHinhAnh']['size']     = $_FILES['temp']['size'][$i];

            $config = array(
                'file_name'     => 'ma_pic_'.$id.'_'.$i,
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 3000,
                'overwrite'     => false,
                'upload_path' => './assets/images/db'
              );
            $this->upload->initialize($config);

            if (! $this->upload->do_upload('danhMucHinhAnh')) {
                $this->session->set_flashdata('upload_error', $this->upload->display_errors());
            } else {
                    $uploaded[$i] = $this->upload->data('file_name');
            }
        }
        return $uploaded;
    }

	/**
	 * Xử lý thêm đánh giá cho một món ăn
	 *
	 * @param string $maMonAn Mã món ăn
	 * @return void
	 */
	public function insertDanhGia($maMonAn) {
		if(!isset($_POST['submit'])){
            return;
        }

        $this->form_validation->set_rules('tieuDeDGMA', 'Tiêu đề', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('baiNhanXetDGMA', 'Bài nhận xét', 'trim|required');

        if (!$this->form_validation->run()) {
            $this->vietDanhGia($maMonAn);
        } else {
            $inserted = $this->DanhGiaMonAn_model->insert($maMonAn);
            
            if ($inserted) {
                redirect('monAn/cacDanhGia/'.$maMonAn.'/'.$inserted);
            } else {
                $this->session->set_flashdata('review_insert_failed', 'Cập nhật không thành công.');
            }           
        }
	}

    /**
     * Hiển thị trang Sửa đánh giá
     *
     * @param int $maDiaDiem Mã đánh giá
     * @return void
     */
    public function suaDanhGia($maDanhGia)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('dangNhap');
        }

        // lấy đánh giá
        $data['danhGia'] = $this->DanhGiaMonAn_model->selectDanhGia($maDanhGia);

        if (count($data['danhGia']) == 0)
            redirect('dieuHuong/not_found');

        // lấy thông tin món ăn 
        $data['monAn'] = $this->MonAn_model->select($data['danhGia']['MaMonAn']);

        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($data['monAn']['MaDiaDiem']);

         // đặt tiêu đề
        $data['title'] = $data['monAn']['TenMonAn'].' tại '.$data['diaDiem_data']['TenDiaDiem'];
 
       // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin món ăn của địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/monAn/info';

        // nội dung chính menu là thực đơn
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/monAn/danhGia-page';

        // nội dung bên trái là đánh giá
        $data['layoutDanhGia'] = 'layouts/diaDiem/monAn/danhGia/suaDanhGia';

        // nội dung bên phải là bảng đánh giá
        $data['layoutBangDanhGia'] = 'layouts/diaDiem/monAn/danhGia/bangDanhGia';
        
        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }


    /**
     * Xử lý kiểm tra và cập nhật đánh giá. Dữ liệu được lấy thông qua $_POST
     *
     * @param int $maDanhGia Mã đánh giá
     * @return void
     */
    public function updateDanhGia($maDanhGia) {
        if(!isset($_POST['submit'])){
            return;
        }

        $maMonAn = $this->DanhGiaMonAn_model->selectDanhGia($maDanhGia)['MaMonAn'];

        $this->form_validation->set_rules('tieuDeDGMA', 'Tiêu đề', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('baiNhanXetDGMA', 'Bài nhận xét', 'trim|required');

        if (!$this->form_validation->run()) {
            $this->suaDanhGia($maDanhGia);
        } else {
            $updated = $this->DanhGiaMonAn_model->update($maDanhGia);
            
            if ($updated) {
                $this->session->set_flashdata('review_update_successful', 'Cập nhật đánh giá thành công.');
            } else {
                $this->session->set_flashdata('review_update_failed', 'Cập nhật đánh giá không thành công.');
            }     

            redirect('monAn/cacDanhGia/'.$maMonAn.'/'.$maDanhGia);    
        }
    }

    /**
     * Xử lý xóa một đánh giá
     *
     * @param string $maDanhGia Mã đánh giá
     * @return void
     */
    public function deleteDanhGia($maDanhGia) {
        $maMonAn = $this->DanhGiaMonAn_model->selectDanhGia($maDanhGia)['MaMonAn'];
        $deleted = $this->DanhGiaMonAn_model->delete($maDanhGia);
        
        if($deleted) {
            $this->session->set_flashdata('review_deleted_successful', 'Xóa đánh giá thành công.');
            redirect('monAn/cacDanhGia/'.$maMonAn);
        }
        else {
            $this->session->set_flashdata('review_deleted_failed', 'Không thể xóa đánh giá.');
            redirect('monAn/cacDanhGia/'.$maMonAn.'/'.$maDanhGia);
        }
    }

    /**
     * Xóa một món ăn, bao gồm xóa tất cả đánh giá, bình luận, hình ảnh.
     *
     * @param int $maMonAn Mã món ăn
     * @return boolean
     */
    public function deleteMonAn($maMonAn) {
        $maDiaDiem = $this->MonAn_model->select($maMonAn)['MaDiaDiem'];

        $this->DanhGiaMonAn_model->deleteAllDanhGia($maMonAn);
        $this->MonAn_model->deleteAllImages($maMonAn);

        if($this->MonAn_model->delete($maMonAn)) {
            $this->session->set_flashdata('food_deleted_successful', 'Xóa món ăn thành công.');
            redirect('diaDiem/thucDon/'.$maDiaDiem);
        }
        else {
            $this->session->set_flashdata('food_deleted_failed', 'Không thể xóa món ăn.');
            redirect('monAn/cacDanhGia/'.$maMonAn);
        }
    }

    /**
     * Xử lý thêm hình ảnh. Phương thức POST
     *
     * @return void
     */
    public function themHinhAnh() {
        if(!isset($_POST['submit'])) {
            return;
        }

        if(!$_FILES['hinhAnh']['size'] == 0 && $_FILES['hinhAnh']['error'] == 0)
            $this->uploadImage($_POST['maMonAn']);
        $this->MonAn_model->insertImage($_POST['maMonAn'], $_POST['pathMA']);

        redirect('monAn/hinhAnh/'.$_POST['maMonAn']);
    }

    /**
     * Upload ảnh cho món ăn
     *
     * @param string $id Khóa chính của món ăn
     * @return void
     */
    public function uploadImage($id)
    {
        $config['upload_path']          = './assets/images/db';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;
        $config['overwrite']            = true;
        $config['file_name']            = 'ma_pic_'.$id.'_'.($this->MonAn_model->selectMaxIndexImage($id) + 1);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('hinhAnh')) {
            $this->session->set_flashdata('upload_error', $this->upload->display_errors());
            return;
        }
             
        $_POST['pathMA'] = $this->upload->data('file_name');
    }

    /**
     * Xóa một hình ảnh của địa điểm. Hàm này chỉ dùng cho AJAX, phương thức POST
     *
     * @return text
     */
    public function deleteImage() {
        $this->MonAn_model->deleteImage($_POST['maMonAn'], $_POST['pathMA']);

        echo json_encode(array('fileDeleted' => str_replace('.','\\.',$_POST['pathMA'])));
    }
   
}
?>