<?php
class MonAn_model extends CI_Model
{
    /**
     * Chèn một món ăn vào bảng. Không bao gồm ảnh đại diện và danh mục hình ảnh.
     * Sau khi chèn phải upload hình ảnh và gọi updateAvatar($id) để cập nhật ảnh đại diện.
     *
     * @return string Trả về mã món ăn nếu thành công. Trả về false nếu không thành công
     */
    public function insert($maDiaDiem)
    {
        $data = array (
            'TenMonAn'      => $_POST['tenMonAn'],
            'MaLoaiMonAn'          => $_POST['maLoaiMonAn'],
            'MoTaMA'            => $_POST['moTaMA'],
            'GiaCaMA'         => $_POST['giaCaMA'],
            'NgayTaoMA'       => date('Y-m-d H:i:s'),
            'DiemTrungBinhMA' => 0,
            'MaDiaDiem'       => $maDiaDiem
        );
        
        $inserted = $this->db->insert('MONAN', $data);
        return $inserted ? $this->db->insert_id() : $inserted;
    }

    /**
     * Cập nhật giá trị ảnh đại diện. Phải upload đảnh đại diện và gán tên ảnh đã upload cho biến $_POST['anhDaiDienMA']
     *
     * @param string $id Mã địa điểm
     * @return void
     */
    public function updateAvatar($id)
    {
        $this->db->where('MaMonAn', $id);
        $this->db->update('MONAN', array(
            'AnhDaiDienMA' => $_POST['anhDaiDienMA']
        ));
    }

    /**
     * Chèn danh mục hình ảnh cho món ăn
     *
     * @param array $uploaded Danh sách các tên file đã upload
     * @param string $id Mã món ăn
     * @return void
     */
    public function insertImages($uploaded, $id)
    {
        $n = count($uploaded);
        for ($i = 0; $i < $n; $i++) {
            $data = array(
                'MaMonAn' => $id,
                'PathMA' => $uploaded[$i]
            );

            $this->db->insert('IMGMONAN', $data);
        }
    }

    /**
     * Chèn một hình ảnh cho món ăn
     *
     * @param int $maMonAn Mã món ăn
     * @param string $pathMA Tên file
     * @return boolean
     */
    public function insertImage($maMonAn, $pathMA) {
        $data = array (
            'MaMonAn' => $maMonAn,
            'PathMA'    => $pathMA
        );

        return $this->db->insert('IMGMONAN', $data);
    }

    /**
     * Lấy danh mục hình ảnh
     *
     * @param string $maMonAn Mã món ăn
     * @return array Danh sách các tên file hình ảnh
     */
    public function selectImages($maMonAn) {
        $this->db->where('MaMonAn', $maMonAn);
        $query = $this->db->get('IMGMONAN');

        return $query->result_array();
    }

    /**
     * Lấy tất cả món ăn của một địa điểm
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return array
     */
    public function selectAll($maDiaDiem) {
        $this->db->where('MaDiaDiem', $maDiaDiem);

        return $this->db->get('MONAN')->result_array();
    }

    /**
     * Lấy thông tin một món ăn
     *
     * @param string  $maMonAn Mã món ăn
     * @return array
     */
    public function select($maMonAn) {
        $this->db->where('MaMonAn', $maMonAn);

        return $this->db->get('MONAN')->row_array();
    }

    /**
     * Cập nhật thông tin một món ăn. Không bao gồm ảnh đại diện và danh mục hình
     *
     * @param string $maMonAn Mã món ăn
     * @return boolean
     */
    public function update($maMonAn) {
        $data = array (
            'TenMonAn'      => $_POST['tenMonAn'],
            'MaLoaiMonAn'   => $_POST['maLoaiMonAn'],
            'MoTaMA'        => $_POST['moTaMA'],
            'GiaCaMA'       => $_POST['giaCaMA'],
        );
        
        $this->db->where('MaMonAn', $maMonAn);
        return  $this->db->update('MONAN', $data);   
    }

    /**
     * Xóa tất cả hình ảnh của một món ăn
     *
     * @param string $maMonAn Mã món ăn
     * @return boolean
     */
    public function deleteAllImages($maMonAn) {
        $this->db->where('MaMonAn', $maMonAn);

        return $this->db->delete('IMGMONAN');
    }

    /**
     * Xóa món ăn
     *
     * @param int $maMonAn Mã món ăn
     * @return boolean
     */
    public function delete($maMonAn) {
        $this->db->where('MaMonAn', $maMonAn);

        return $this->db->delete('MONAN');
    }

    /**
     * tìm kiếm món ăn
     *
     * @param string $key
     * @return result
     */
    public function timKiem($key)
    {
        # code...
        $this->db->like('TenMonAn', $key);
        $query = $this->db->get('MONAN');
       return $query->result_array(); 

    }
    /**
     * Xóa tất cả món ăn của một địa điểm
     *
     * @param int $maDiaDiem Mã địa điểm
     * @return boolean
     */
    public function deleteAllMonAn($maDiaDiem) {
        $cacMonAn = $this->selectAll($maDiaDiem);
        foreach ($cacMonAn as $monAn) {
            $this->DanhGiaMonAn_model->deleteAllDanhGia($monAn['MaMonAn']);
            $this->deleteAllImages($monAn['MaMonAn']);
        }

        $this->db->where('MaDiaDiem', $maDiaDiem);
        return $this->db->delete('MONAN');

    }

    /**
     * Lấy chỉ số lớn nhất của hình trong danh mục hình của món ăn. Dùng để đặt tên hình tiếp theo cho món ăn.
     *
     * @param int $maMonAn Mã món ăn
     * @return int
     */
    public function selectMaxIndexImage($maMonAn) {
        $this->db->select_max("SUBSTRING_INDEX(SUBSTRING_INDEX(PathMA,'.',1), '_', -1)", "MAX");
        $this->db->where('MaMonAn', $maMonAn);

        return $this->db->get('IMGMONAN')->row_array()['MAX'];
    }

    /**
     * Xóa một hình ảnh của địa điểm
     *
     * @param int $maMonAn Mã món ăn
     * @param string $pathMA Tên file hình
     * @return boolean
     */
    public function deleteImage($maMonAn, $pathMA) {
        $this->db->where('MaMonAn', $maMonAn);
        $this->db->where('PathMA', $pathMA);

        return $this->db->delete('IMGMONAN');
    }

    /**
     * Lấy món ăn theo đtb giảm dần
     *
     * @return void
     */
    public function selectMonNgon()
    {
        # code...
        $this->db->select('*');
        $this->db->order_by('DiemTrungBinhMA', 'desc');
        $this->db->limit(5);
        $query = $this->db->get('MonAn');
        return  $query->result_array();
    }
}
?>