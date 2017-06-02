<?php
class DangNhap extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in'))
            redirect(base_url());
    }

    /**
     * Hiển thị trang Đăng nhập và xử lý đăng nhập
     *
     * @return void
     */
    public function index()
    {
        $this->form_validation->set_rules('tenDangNhap', 'Tên đăng nhập', 'trim|required|max_length[100]|min_length[2]');
        $this->form_validation->set_rules('matKhau', 'Mật khẩu', 'trim|required|max_length[50]|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $data['main_content'] = 'dangNhap';
            $this->load->view('layouts/main-register', $data);
        } else {
            $tenDangNhap = $this->input->post('tenDangNhap');
            $matKhau = $this->input->post('matKhau');

            $this->load->model('NguoiDung_model');
            $user = $this->NguoiDung_model->login($tenDangNhap, $matKhau);

            if ($user) {
                $info = $this->NguoiDung_model->select($tenDangNhap);
                $userdata = array(
                    'tenDangNhap' => $tenDangNhap,
                    'logged_in'   => TRUE,
                    'maQH'        => $info['MaQH']
                    );
                $this->session->set_userdata($userdata);
                redirect('Home');
            } else {
                $this->session->set_flashdata('login_failed', 'Tên đăng nhập hoặc mật khẩu không chính xác.');
                redirect('DangNhap');
            }
        }
    }
}
