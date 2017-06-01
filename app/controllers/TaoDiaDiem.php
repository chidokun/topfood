<?php
class TaoDiaDiem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect("DangNhap");
        }
    }

    /**
     * Hiển thị trang Tạo địa điểm và xử lý thêm địa điểm
     *
     * @return void
     */
    public function index()
    {
        $this->form_validation->set_rules('tenDiaDiem', 'Tên địa điểm', 'trim|required|max_length[100]|min_length[5]');
        $this->form_validation->set_rules('diaChi', 'Địa chỉ', 'trim|required|max_length[200]|min_length[6]');
        $this->form_validation->set_rules('soDT', 'Số điện thoại', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('emailDD', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('moTaDD', 'Mô tả địa điểm', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data["main_content"] = "taoDiaDiem";
            $this->load->view("layouts/main", $data);
        } else {
            $inserted = $this->DiaDiem_model->insert();
            //insert information
            if ($inserted) {
                $this->session->set_flashdata('place_created', 'Địa điểm được tạo thành công. Vui lòng chờ quản trị viên xét duyệt trong vòng 24h.');

                //upload avatar
                if (!$_FILES['anhDaiDienDD']['size'] == 0 && $_FILES['anhDaiDienDD']['error'] == 0) {
                     $this->uploadAvatar($inserted);
                     $this->DiaDiem_model->updateAvatar($inserted);
                }
               
                //upload pictures
                $uploaded = $this->uploadImages($inserted);
                $this->DiaDiem_model->insertImages($uploaded, $inserted);

                //chuyển đến trang cá nhân địa điểm
                redirect('diaDiem/cacDanhGia/'.$inserted);
            }
        }
    }
    
    /**
     * Upload ảnh đại diện địa điểm
     *
     * @param string $id Khóa chính của địa điểm
     * @return void
     */
    public function uploadAvatar($id)
    {
        $config['upload_path']          = './assets/images/db';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['file_name']            = "dd_avatar_".$id;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('anhDaiDienDD')) {
            $this->session->set_flashdata('upload_error', $this->upload->display_errors());
        }
             
        $_POST['anhDaiDienDD'] = $this->upload->data('file_name');
    }

    /**
     * Upload danh mục hình ảnh cho địa điểm đó
     *
     * @param string $id Khóa chính của địa điểm đó
     * @return array $uploaded Mảng các tên file đã được upload
     */
    public function uploadImages($id)
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
                'file_name'     => 'dd_pic_'.$id.'_'.$i,
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
}
