<?php
class DiaDiem extends CI_Controller
{
    /**
     * Hiển thị trang Đánh giá của một địa điểm.
     * 
     * @param int $maDiaDiem Mã địa điểm
     * @return void
     */
    public function cacDanhGia($maDiaDiem)
    {
        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

        // đặt tiêu đề
        $data['title'] = $data['diaDiem_data']['TenDiaDiem'].' - Đánh giá';
        
        // trường hợp tất cả đánh giá
        if (!$this->uri->rsegment(4)) {
            // lấy bảng đánh giá
            $data['bangDanhGia_data'] = $this->DanhGiaDiaDiem_model->selectBangDanhGia($maDiaDiem);
            $data['tongDanhGia'] = $this->DanhGiaDiaDiem_model->selectTongDanhGia($maDiaDiem);
            $data['tongBinhLuan'] = $this->DanhGiaDiaDiem_model->selectTongBinhLuan($maDiaDiem);
            
            // lấy danh sách đánh giá
            $data['cacDanhGia'] = $this->DanhGiaDiaDiem_model->selectAllDanhGia($maDiaDiem);

            // nội dung bên trái là các đánh giá
            $data['layoutDanhGia'] = 'layouts/diaDiem/danhGia/cacDanhGia';

            // nội dung bên phải là bảng đánh giá
            $data['layoutBangDanhGia'] = 'layouts/diaDiem/danhGia/bangDanhGiaChung';
        }
        //trường hợp chỉ 1 đánh giá
        else {
            $data['danhGia'] = $this->DanhGiaDiaDiem_model->selectDanhGia($this->uri->rsegment(4));
            
            if (!isset($data['danhGia']) || $data['danhGia']['MaDiaDiem'] != $maDiaDiem) {
                //đánh giá ko có hoặc k thuộc về địa điểm, điều hướng thông báo lỗi
            }

            //load các bình luận ..
            $data['cacBinhLuan'] = $this->BinhLuanDD_model->selectAllBinhLuan($data['danhGia']['MaDGDD']);

            // nội dung bên trái là đánh giá
            $data['layoutDanhGia'] = 'layouts/diaDiem/danhGia/danhGiaItem';

            // nội dung bên phải là bảng đánh giá
            $data['layoutBangDanhGia'] = 'layouts/diaDiem/danhGia/bangDanhGia';
        }

        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/info';

        // nội dung chính menu là đánh giá
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/danhGia-page';
        
        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    /**
     * Hiển thị trang Hình ảnh của một địa điểm
     *
     * @param int $maDiaDiem Mã địa điểm
     * @return void
     */
    public function hinhAnh($maDiaDiem)
    {
        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

         // đặt tiêu đề
        $data['title'] = $data['diaDiem_data']['TenDiaDiem'].' - Hình ảnh';

        // lấy danh mục hình ảnh
        $data['listImg'] = $this->DiaDiem_model->selectImages($maDiaDiem);

        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/info';

        // nội dung chính menu là hình ảnh
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/hinhAnh-page';

        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    /**
     * Hiển thị trang Thực đơn của địa điểm
     *
     * @param int $maDiaDiem Mã địa điểm
     * @return void
     */
    public function thucDon($maDiaDiem)
    {
        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

        // lấy danh sách các món ăn 
        $data['cacMonAn'] = $this->MonAn_model->selectAll($maDiaDiem);

         // đặt tiêu đề
        $data['title'] = $data['diaDiem_data']['TenDiaDiem'].' - Thực đơn';

        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/info';

        // nội dung chính menu là thực đơn
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/thucDon-page';
        
        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    /**
     * Hiển thị trang Thông tin chi tiết của địa điểm. Cũng bao gồm trang chỉnh sửa thông tin
     *
     * @param int $maDiaDiem Mã địa điểm
     * @return void
     */
    public function info($maDiaDiem)
    {
        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

         // đặt tiêu đề
        $data['title'] = $data['diaDiem_data']['TenDiaDiem'].' - Thông tin chi tiết';

        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/info';

        // nội dung chính menu là thông tin
        if ($this->uri->rsegment(4) == 'edit') {
            $data['layoutDiaDiemContent'] = 'layouts/diaDiem/thongTin-edit';
        } else {
            $data['layoutDiaDiemContent'] = 'layouts/diaDiem/thongTin-page';
        }
        
        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    /**
     * Xử lý kiểm tra và cập nhật thông tin địa điểm. Điều hướng tới trang Thông tin chi tiết sau khi thực hiện xong.
     *
     * @param int $maDiaDiem Mã địa điểm
     * @return void
     */
    public function updateInfo($maDiaDiem)
    {
        $this->form_validation->set_rules('tenDiaDiem', 'Tên địa điểm', 'trim|required|max_length[100]|min_length[5]');
        $this->form_validation->set_rules('diaChi', 'Địa chỉ', 'trim|required|max_length[200]|min_length[6]');
        $this->form_validation->set_rules('soDT', 'Số điện thoại', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('emailDD', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('website', 'Website', 'trim|required');
        $this->form_validation->set_rules('moTaDD', 'Mô tả địa điểm', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);
            $data['title'] = $data['diaDiem_data']['TenDiaDiem'].' - Đánh giá';
            $data['main_content'] = 'layouts/diaDiem';
            $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/info';
            $data['layoutDiaDiemContent'] = 'layouts/diaDiem/thongTin-edit';

            $this->load->view('layouts/main', $data);
        } else {
            //update information
            if ($this->DiaDiem_model->update($maDiaDiem)) {
                $this->session->set_flashdata('place_updated_successful', 'Thông tin đã được cập nhật.');
            } else {
                $this->session->set_flashdata('place_updated_failed', 'Cập nhật không thành công.');
            }

            redirect('diaDiem/info/'.$maDiaDiem);
        }
    }

    /**
     * Hiển thị trang Viết đánh giá
     *
     * @param int $maDiaDiem Mã địa điểm
     * @return void
     */
    public function vietDanhGia($maDiaDiem)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('dangNhap');
        }

        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

         // đặt tiêu đề
        $data['title'] = 'Viết đánh giá cho '.$data['diaDiem_data']['TenDiaDiem'];

        // lấy bảng đánh giá
        $data['bangDanhGia_data'] = $this->DanhGiaDiaDiem_model->selectBangDanhGia($maDiaDiem);
        $data['tongDanhGia'] = $this->DanhGiaDiaDiem_model->selectTongDanhGia($maDiaDiem);
        $data['tongBinhLuan'] = $this->DanhGiaDiaDiem_model->selectTongBinhLuan($maDiaDiem);

        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/info';

        // nội dung chính menu là đánh giá
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/danhGia-page';

        // nội dung bên trái là các đánh giá
        $data['layoutDanhGia'] = 'layouts/diaDiem/danhGia/vietDanhGia';

        // nội dung bên phải là bảng đánh giá
        $data['layoutBangDanhGia'] = 'layouts/diaDiem/danhGia/bangDanhGiaChung';
        
        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    /**
     * Hiển thị trang Sửa đánh giá
     *
     * @param int $maDiaDiem Mã địa điểm
     * @return void
     */
    public function suaDanhGia($maDanhGia)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('dangNhap');
        }

        // lấy đánh giá
        $data['danhGia'] = $this->DanhGiaDiaDiem_model->selectDanhGia($maDanhGia);

        // lấy thông tin địa điểm
        $maDiaDiem = $data['danhGia']['MaDiaDiem'];
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

         // đặt tiêu đề
        $data['title'] = 'Sửa đánh giá của '.$data['diaDiem_data']['TenDiaDiem'];

        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/info';

        // nội dung chính menu là đánh giá
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/danhGia-page';

        // nội dung bên trái là các đánh giá
        $data['layoutDanhGia'] = 'layouts/diaDiem/danhGia/suaDanhGia';

        // nội dung bên phải là bảng đánh giá
        $data['layoutBangDanhGia'] = 'layouts/diaDiem/danhGia/bangDanhGia';
        
        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    /**
     * Xử lý kiểm tra và thêm đánh giá. Dữ liệu được lấy thông qua $_POST
     *
     * @param int $maDiaDiem Mã địa điểm
     * @return void
     */
    public function insertDanhGia($maDiaDiem) {
        if(!isset($_POST['submit'])){
            return;
        }

        $this->form_validation->set_rules('tieuDeDGDD', 'Tiêu đề', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('baiNhanXetDGDD', 'Bài nhận xét', 'trim|required');

        if (!$this->form_validation->run()) {
            $this->vietDanhGia($maDiaDiem);
        } else {
            $inserted = $this->DanhGiaDiaDiem_model->insert($maDiaDiem);
            
            if ($inserted) {
                redirect('diaDiem/cacDanhGia/'.$maDiaDiem.'/'.$inserted);
            } else {
                $this->session->set_flashdata('review_insert_failed', 'Cập nhật không thành công.');
            }           
        }
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

        $maDiaDiem = $this->DanhGiaDiaDiem_model->selectDanhGia($maDanhGia)['MaDiaDiem'];

        $this->form_validation->set_rules('tieuDeDGDD', 'Tiêu đề', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('baiNhanXetDGDD', 'Bài nhận xét', 'trim|required');

        if (!$this->form_validation->run()) {
            $this->suaDanhGia($maDanhGia);
        } else {
            $updated = $this->DanhGiaDiaDiem_model->update($maDanhGia);
            
            if ($updated) {
                $this->session->set_flashdata('review_update_successful', 'Cập nhật đánh giá thành công.');
            } else {
                $this->session->set_flashdata('review_update_failed', 'Cập nhật đánh giá không thành công.');
            }     

            redirect('diaDiem/cacDanhGia/'.$maDiaDiem.'/'.$maDanhGia);    
        }
    }

    /**
     * Xử lý xóa một đánh giá
     *
     * @param string $maDanhGia Mã đánh giá
     * @return void
     */
    public function deleteDanhGia($maDanhGia) {
        $maDiaDiem = $this->DanhGiaDiaDiem_model->selectDanhGia($maDanhGia)['MaDiaDiem'];
        $deleted = $this->DanhGiaDiaDiem_model->delete($maDanhGia);
        
        if($deleted) {
            $this->session->set_flashdata('review_deleted_successful', 'Xóa đánh giá thành công.');
            redirect('diaDiem/cacDanhGia/'.$maDiaDiem);
        }
        else {
            $this->session->set_flashdata('review_deleted_failed', 'Không thể xóa đánh giá.');
            redirect('diaDiem/cacDanhGia/'.$maDiaDiem.'/'.$maDanhGia);
        }
    }

    /**
     * Xóa một địa điểm
     *
     * @param int $maDiaDiem Mã địa điểm
     * @return boolean
     */
    public function delete($maDiaDiem) {
         $deleted = $this->DiaDiem_model->delete($maDiaDiem);
        
        if($deleted) {
            $this->session->set_flashdata('place_deleted_successful', 'Xóa địa điểm thành công.');
            redirect(base_url());
        }
        else {
            $this->session->set_flashdata('place_deleted_failed', 'Không thể xóa địa điểm.');
            redirect('diaDiem/cacDanhGia/'.$maDiaDiem);
        }
    }

    /**
     * Xóa một hình ảnh của địa điểm. Hàm này chỉ dùng cho AJAX, phương thức POST
     *
     * @return text
     */
    public function deleteImage() {
        $this->DiaDiem_model->deleteImage($_POST['maDiaDiem'], $_POST['pathDD']);

        echo json_encode(array('fileDeleted' => str_replace('.','\\.',$_POST['pathDD'])));
    }

    /**
     * Upload ảnh cho địa điểm
     *
     * @param string $id Khóa chính của địa điểm
     * @return void
     */
    public function uploadImage($id)
    {
        $config['upload_path']          = './assets/images/db';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;
        $config['overwrite']            = true;
        $config['file_name']            = 'dd_pic_'.$id.'_'.($this->DiaDiem_model->selectMaxIndexImage($id) + 1);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('hinhAnh')) {
            $this->session->set_flashdata('upload_error', $this->upload->display_errors());
            return;
        }
             
        $_POST['pathDD'] = $this->upload->data('file_name');
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
            $this->uploadImage($_POST['maDiaDiem']);
        $this->DiaDiem_model->insertImage($_POST['maDiaDiem'], $_POST['pathDD']);

        redirect('diaDiem/hinhAnh/'.$_POST['maDiaDiem']);
    }
}
