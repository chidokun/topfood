<?php
class Home extends CI_Controller {

	public function index() {
		
		$data['title'] = 'topFood';
		//Lấy thông tin 5 review nhiều like nhất
		$data['topreview_data'] = $this->DanhGiaDiaDiem_model->selectTop5();  

		//Lấy thông tin các địa điểm được tạo trong vòng 7 ngày 
		$data['diadiemmoi_data'] = $this->DiaDiem_model->selectDiaDiemMoi();

		//Lấy thông tin các đánh giá địa điểm được tạo
		$this->load->library('pagination');
		$perPage = 9;
		$config['base_url'] = base_url().'home/index';
        $config['total_rows'] = $this->DanhGiaDiaDiem_model->countAll();
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';    
        $config['uri_segment']  = 3;
        $config['per_page'] = $perPage;
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_link']  = 'Cuối';
        $config['first_link'] = 'Đầu';
        $this->pagination->initialize($config);
        $data['paginator'] = $this->pagination->create_links(); 
		$offset = $this->uri->rsegment(3) == '' ? 0 : $this->uri->rsegment(3);
		$data['danhgiamoi_data'] = $this->DanhGiaDiaDiem_model->selectReviewMoi($perPage, $offset); 

		//Lấy thông tin các món ăn có điểm trung bình cao nhất
		$data['monan_data'] = $this->MonAn_model->selectMonNgon();

		$data['monngon'] = 'layouts/trangChu/monNgon' ;
		$data['diadiem_moi'] = 'layouts/trangChu/diaDiemMoi';
		$data['review_moinhat'] = 'layouts/trangChu/reviewMoiNhat';
		$data['topreview'] = 'layouts/trangChu/diaDiemThichNhieuNhat';
		$data['main_content'] = 'layouts/trangChu';
		$this->load->view("layouts/main",$data);
	}
}
?>