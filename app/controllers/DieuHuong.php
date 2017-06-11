<?php
class DieuHuong extends CI_Controller
{
    /**
     * Trang nội dung đang được cập nhật
     *
     * @return void
     */
    public function content_updating() {
        // đặt tiêu đề
        $data['title'] = 'Nội dung đang được cập nhật';

         // chọn layout địa điểm
        $data['main_content'] = 'layouts/routing/content_updating';
        
        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }

    /**
     * Không tìm thấy nội dung
     *
     * @return void
     */
    public function not_found() {
        // đặt tiêu đề
        $data['title'] = 'Không tìm thấy nội dung';

         // chọn layout địa điểm
        $data['main_content'] = 'layouts/routing/not_found';
        
        // hiển thị giao diện
        $this->load->view('layouts/main', $data);
    }
}
?>