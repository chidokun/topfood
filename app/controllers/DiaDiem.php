<?php
class DiaDiem extends CI_Controller
{
    public function cacDanhGia($maDiaDiem)
    {
        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

        
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

            //load tiếp bình luận ..
            //blablabla

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

    public function hinhAnh($maDiaDiem)
    {
        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

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

    public function thucDon($maDiaDiem)
    {
        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

        // chọn layout địa điểm
        $data['main_content'] = 'layouts/diaDiem';

        // load thông tin địa điểm
        $data['layoutDiaDiemInfo'] = 'layouts/diaDiem/info';

        // nội dung chính menu là thực đơn
        $data['layoutDiaDiemContent'] = 'layouts/diaDiem/thucDon-page';
        
        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    public function info($maDiaDiem)
    {
        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

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

    public function vietDanhGia($maDiaDiem)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('dangNhap');
        }

        // lấy thông tin địa điểm
        $data['diaDiem_data'] = $this->DiaDiem_model->select($maDiaDiem);

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
}
