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
}
?>