<?php
class Home extends CI_Controller {

	public function index() {
		
		$data['title'] = 'topFood';
		//Lấy thông tin 5 review nhiều like nhất
		$data['topreview_data'] = $this->DanhGiaDiaDiem_model->selectTop5();  

		//Lấy thông tin các địa điểm được tạo trong vòng 7 ngày 
		$data['diadiemmoi_data'] = $this->DiaDiem_model->selectDiaDiemMoi();

		//Lấy thông tin các đánh giá địa điểm được tạo trong vòng 7 ngày 
		$data['danhgiamoi_data'] = $this->DanhGiaDiaDiem_model->selectReviewMoi();

		//Lấy thông tin các món ăn có điểm trung bình cao nhất
		$data['monan_data'] = $this->MonAn_model->selectMonNgon();
		// $segment = $this->uri->segment(1);
		///$segment = intval($segment);

		$data['monngon'] = 'layouts/trangChu/monNgon' ;
		$data['diadiem_moi'] = 'layouts/trangChu/diaDiemMoi';
		$data['review_moinhat'] = 'layouts/trangChu/reviewMoiNhat';
		$data['topreview'] = 'layouts/trangChu/diaDiemThichNhieuNhat';
		$data['main_content'] = 'layouts/trangChu';
		$this->load->view("layouts/main",$data);

		// $this->load->library('pagination'); 
		// $limit= 6;    
		// $offset=$this->uri->segment(2);
		// $this->db->limit($limit, $offset);
		// $data['danhgiamoi_data'] = $this->DanhGiaDiaDiem_model->selectReviewMoi();    
          
		// $config = array();         
// pagination        
//         $config['base_url'] = site_url().'Home/index' ;
//         $config['uri_segment']  = 2;
//         $config['per_page'] = $limit;
//         $config['prev_link']  = 'Trang trước;';
//         $config['next_link']  = 'Trang kế tiếp';
// 		$config['reuse_query_string'] = TRUE;
//         $this->pagination->initialize($config); 
// 		$paginator=$this->pagination->create_links();
// // End pagination                             
		
		
        
// 		$limit = array($config['per_page'], $segment);		
// 		$data['danhgiamoi_data'] = $this->DanhGiaDiaDiem_model->selectReviewMoi_input($limit);
         
	}

}
?>