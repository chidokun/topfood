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

    /**
     * Thích một bình luận
     *
     * @param string $maDanhGia Mã bình luận
     * @return boolean
     */
    public function like($maBinhLuan) {
        $data = array (
            'MaBLDD'      => $maBinhLuan,
            'TenDangNhap' => $this->session->userdata('tenDangNhap')
        );

        return $this->db->insert('THICHBLDD', $data);
    }

    /**
     * Bỏ thích một bình luận
     *
     * @param string $maDanhGia Mã bình luận
     * @return boolean
     */
    public function unlike($maBinhLuan) {
        $this->db->where('MaBLDD', $maBinhLuan);
        $this->db->where('TenDangNhap', $this->session->userdata('tenDangNhap'));

        return $this->db->delete('THICHBLDD');
    }

    /**
     * Đếm tổng lượt thích của bình luận
     *
     * @param string $maDanhGia Mã bình luận
     * @return int
     */
    public function countLike($maBinhLuan) {
        $this->db->where('MaBLDD', $maBinhLuan);

        return $this->db->get('THICHBLDD')->num_rows();
    }

    /**
     * Kiểm tra người dùng đang đăng nhập có like bình luận chưa
     *
     * @param string $maDanhGia Mã bình luận
     * @return boolean
     */
    public function isLiked($maBinhLuan) {
        $this->db->where('MaBLDD', $maBinhLuan);
        $this->db->where('TenDangNhap', $this->session->userdata('tenDangNhap'));

        return $this->db->get('THICHBLDD')->num_rows() == 1;
    }

    /**
     * Xóa tất cả lượt thích của bình luận
     *
     * @param string $maBinhLuan Mã bình luận
     * @return boolean
     */
    public function deleteAllLike($maBinhLuan) {
        $this->db->where('MaBLDD', $maBinhLuan);

        return $this->db->delete('THICHBLDD');
    }

    /**
     * Xóa tất cả bình luận của đánh giá.
     *
     * @param string $maDanhGia
     * @return boolean
     */
    public function deleteAllBinhLuan($maDanhGia) {
        $cacBinhLuan = $this->selectAllBinhLuan($maDanhGia);
        foreach ($cacBinhLuan as $binhLuan) {
            $this->deleteAllLike($binhLuan['MaBLDD']);
        }

        $this->db->where('MaDGDD', $maDanhGia);
        return $this->db->delete('BINHLUANDD');
    }
}
?>