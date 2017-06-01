<?php
class DanhGiaDiaDiem extends CI_Controller
{
    /**
     * Thêm một bình luận mới vào CSDL. Hàm này dùng cho AJAX
     *
     * @return json
     */
    public function insertBinhLuan() {
        $id = $this->BinhLuanDD_model->insertBinhLuan();
        return $id ? json_encode($this->BinhLuanDD_model->selectBinhLuan($id)) : $id;
    }
}
?>