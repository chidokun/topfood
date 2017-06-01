<?php
class BinhLuanDD_model extends CI_Model
{
    /**
     * Lấy danh sách tất cả các bình luận của một đánh giá
     *
     * @param string $maDanhGia Mã đánh giá địa điểm
     * @return array
     */
    public function selectAllBinhLuan($maDanhGia) {
        $this->db->where('MaDGDD', $maDanhGia);
        $query = $this->db->get('BINHLUANDD');

        return $query->result_array();
    }

    /**
     * Chèn một bình luận
     *
     * @return mixed Nếu thành công trả về id của bình luận, nếu không thành công trả về false.
     */
    public function insertBinhLuan() {
        $data = array (
            'NoiDungBLDD'       => $_POST['NoiDungBLDD'],
            'NgayTaoBLDD'       => date('Y-m-d H:i:s'),
            'TongLuotThichBLDD' => 0,
            'MaDGDD'            => $_POST['MaDGDD'],
            'TenDangNhap'       => $this->session->userdata('tenDangNhap')
        );

        $inserted = $this->db->insert('BINHLUANDD', $data);
        return $inserted ? $this->db->insert_id() : $inserted;
    }

    /**
     * Lấy thông tin một bình luận
     *
     * @param string $maBinhLuan Mã bình luận
     * @return array
     */
    public function selectBinhLuan($maBinhLuan) {
        $this->db->where('MaBLDD', $maBinhLuan);
        $query = $this->db->get('BINHLUANDD');

        return $query->row_array();
    }
}
?>