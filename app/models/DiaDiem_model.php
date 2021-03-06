<?php
class DiaDiem_model extends CI_Model
{
    /**
     * Chèn một địa điểm vào bảng. Không bao gồm ảnh đại diện và danh mục hình ảnh.
     * Sau khi chèn phải upload hình ảnh và gọi updateAvatar($id) để cập nhật ảnh đại diện.
     *
     * @return string Trả về mã địa điểm nếu thành công. Trả về false nếu không thành công
     */
    public function insert()
    {
        $data = array (
            'TenDiaDiem'      => $_POST['tenDiaDiem'],
            'DiaChi'          => $_POST['diaChi'],
            'SoDT'            => $_POST['soDT'],
            'EmailDD'         => $_POST['emailDD'],
            'Website'         => $_POST['website'],
            'GioMoCua'        => $_POST['gioMoCua'],
            'GioDongCua'      => $_POST['gioDongCua'],
            'MoTaDD'          => $_POST['moTaDD'],
            'NgayTaoDD'       => date('Y-m-d H:i:s'),
            'DiemTrungBinhDD' => 0,
            'TrangThai'       => 0,
            'TenDangNhap'     => $this->session->userdata('tenDangNhap')
        );
        
        $inserted = $this->db->insert('DIADIEM', $data);
        return $inserted ? $this->db->insert_id() : $inserted;
    }

    /**
     * Lấy dữ liệu của một địa điểm.
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return array Mảng dữ liệu địa điểm
     */
    public function select($maDiaDiem)
    {
        $this->db->where('maDiaDiem', $maDiaDiem);
        $query = $this->db->get('DIADIEM');

        return $query->row_array();
    }

    /**
     * Cập nhật giá trị ảnh đại diện. Phải upload đảnh đại diện và gán tên ảnh đã upload cho biến $_POST['anhDaiDienDD']
     *
     * @param string $id Mã địa điểm
     * @return void
     */
    public function updateAvatar($id)
    {
        $this->db->where('MaDiaDiem', $id);
        $this->db->update('DIADIEM', array(
            'AnhDaiDienDD' => $_POST['anhDaiDienDD']
        ));
    }

    /**
     * Chèn danh mục hình ảnh cho địa điểm
     *
     * @param array $uploaded Danh sách các tên file đã upload
     * @param string $id Mã địa điểm
     * @return void
     */
    public function insertImages($uploaded, $id)
    {
        $n = count($uploaded);
        for ($i = 0; $i < $n; $i++) {
            $data = array(
                'MaDiaDiem' => $id,
                'PathDD' => $uploaded[$i]
            );

            $this->db->insert('IMGDIADIEM', $data);
        }
    }

    /**
     * Chèn một hình ảnh cho địa điểm
     *
     * @param int $maDiaDiem Mã địa điểm
     * @param string $pathDD Tên file
     * @return boolean
     */
    public function insertImage($maDiaDiem, $pathDD) {
        $data = array (
            'MaDiaDiem' => $maDiaDiem,
            'PathDD'    => $pathDD
        );

        return $this->db->insert('IMGDIADIEM', $data);
    }

    /**
     * Lấy danh mục hình ảnh
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return array Danh sách các tên file hình ảnh
     */
    public function selectImages($maDiaDiem) {
        $this->db->where('maDiaDiem', $maDiaDiem);
        $query = $this->db->get('IMGDIADIEM');

        return $query->result_array();
    }

    /**
     * Cập nhật thông tin một địa điểm
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return void
     */
    public function update($maDiaDiem) {
        $data = array (
            'TenDiaDiem'      => $_POST['tenDiaDiem'],
            'DiaChi'          => $_POST['diaChi'],
            'SoDT'            => $_POST['soDT'],
            'EmailDD'         => $_POST['emailDD'],
            'Website'         => $_POST['website'],
            'GioMoCua'        => $_POST['gioMoCua'],
            'GioDongCua'      => $_POST['gioDongCua'],
            'MoTaDD'          => $_POST['moTaDD'],
        );
        
        $this->db->where('MaDiaDiem', $maDiaDiem);
        return  $this->db->update('DIADIEM', $data);   
    }

    /**
     * Chọn các địa điểm đang chờ duyệt có trạng thái là 0
     *
     * @param string $maDiaDiem
     * @return array
     */
    public function selectDiaDiemCho()
    {
        $this->db->where('TrangThai', 0);
        $query = $this->db->get('DIADIEM');

        return $query->result_array();
    }

    /**
     * Lấy giá min, max của địa điểm
     *
     * @param int $maDiaDiem
     * @return array Min Max
     */
    public function selectGia($maDiaDiem) {
        $this->db->where('MaDiaDiem', $maDiaDiem);
        $this->db->select('min(GiaCaMA) as Min, max(GiaCaMA) as Max');
        $this->db->from('MONAN');

        return $this->db->get()->row_array();
    }

    /**
     * Lấy tất cả các địa điểm theo người dùng
     *
     * @return array
     */
    public function selectAll($tenDangNhap) {
        $this->db->where('TenDangNhap', $tenDangNhap);

        return $this->db->get('DIADIEM')->result_array();
    }

    /**
     * Duyệt địa điểm chờ
     *
     * @param int $maDiaDiem
     * @return boolean
     */
    public function duyetDiaDiem($maDiaDiem){
        $data = array(
            'TrangThai' => 1
        );

        $this->db->where('MaDiaDiem', $maDiaDiem);
        return $this->db->update('DIADIEM', $data);
    }

    /**
     * Tìm kiếm theo tên
     *
     * @param string $key
     * @return array
     */
    public function timKiem($key)
    {
        $this->db->like('TenDiaDiem', $key);
        $this->db->where('TrangThai', 1);

        $query = $this->db->get('DIADIEM');
        return $query->result_array(); 
    }

    /**
     * Xóa tất cả hình ảnh của địa điểm
     *
     * @param int $maDiaDiem Mã địa điểm
     * @return boolean
     */
    public function deleteAllImages($maDiaDiem) {
        $this->db->where('MaDiaDiem', $maDiaDiem);

        return $this->db->delete('IMGDIADIEM');
    }

    /**
     * Xóa một địa điểm
     *
     * @param int $maDiaDiem
     * @return boolean
     */
    public function delete($maDiaDiem) {
        $this->DanhGiaDiaDiem_model->deleteAllDanhGia($maDiaDiem);
        $this->MonAn_model->deleteAllMonAn($maDiaDiem);
        $this->deleteAllImages($maDiaDiem);

        $this->db->where('MaDiaDiem', $maDiaDiem);
        return $this->db->delete('DIADIEM');
    }

    /**
     * Xóa một hình ảnh của địa điểm
     *
     * @param int $maDiaDiem Mã địa điểm
     * @param string $pathDD Tên file hình
     * @return boolean
     */
    public function deleteImage($maDiaDiem, $pathDD) {
        $this->db->where('MaDiaDiem', $maDiaDiem);
        $this->db->where('PathDD', $pathDD);

        return $this->db->delete('IMGDIADIEM');
    }

    /**
     * Lấy chỉ số lớn nhất của hình trong danh mục hình của địa điểm. Dùng để đặt tên hình tiếp theo cho địa điểm.
     *
     * @param int $maDiaDiem Mã địa điểm
     * @return int
     */
    public function selectMaxIndexImage($maDiaDiem) {
        $this->db->select_max("SUBSTRING_INDEX(SUBSTRING_INDEX(PathDD,'.',1), '_', -1)", "MAX");
        $this->db->where('MaDiaDiem', $maDiaDiem);

        return $this->db->get('IMGDIADIEM')->row_array()['MAX'];
    }
    /**
     * Chọn 5 địa điểm mới ngày gần đây
     *
     * @return void
     */
    public function selectDiaDiemMoi()
    {
        $this->db->where('TrangThai',1);
        $this->db->order_by('NgayTaoDD','desc');
        $this->db->limit(5);
        $query = $this->db->get('DiaDiem');
        return  $query->result_array();
    }

}
?>