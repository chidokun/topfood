<?php
class BinhLuanMA_model extends CI_Model
{
    /**
     * Lấy danh sách tất cả các bình luận của một đánh giá
     *
     * @param string $maDanhGia Mã đánh giá món ăn
     * @return array
     */
    public function selectAllBinhLuan($maDanhGia) {
        $this->db->where('MaDGMA', $maDanhGia);
        $query = $this->db->get('BINHLUANMA');

        return $query->result_array();
    }

    /**
     * Chèn một bình luận
     *
     * @return mixed Nếu thành công trả về id của bình luận, nếu không thành công trả về false.
     */
    public function insertBinhLuan() {
        $data = array (
            'NoiDungBLMA'       => $_POST['NoiDungBLMA'],
            'NgayTaoBLMA'       => date('Y-m-d H:i:s'),
            'TongLuotThichBLMA' => 0,
            'MaDGMA'            => $_POST['MaDGMA'],
            'TenDangNhap'       => $this->session->userdata('tenDangNhap')
        );

        $inserted = $this->db->insert('BINHLUANMA', $data);
        return $inserted ? $this->db->insert_id() : $inserted;
    }

    /**
     * Lấy thông tin một bình luận
     *
     * @param string $maBinhLuan Mã bình luận
     * @return array
     */
    public function selectBinhLuan($maBinhLuan) {
        $this->db->where('MaBLMA', $maBinhLuan);
        $query = $this->db->get('BINHLUANMA');

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
            'MaBLMA'      => $maBinhLuan,
            'TenDangNhap' => $this->session->userdata('tenDangNhap')
        );

        return $this->db->insert('THICHBLMA', $data);
    }

    /**
     * Bỏ thích một bình luận
     *
     * @param string $maDanhGia Mã bình luận
     * @return boolean
     */
    public function unlike($maBinhLuan) {
        $this->db->where('MaBLMA', $maBinhLuan);
        $this->db->where('TenDangNhap', $this->session->userdata('tenDangNhap'));

        return $this->db->delete('THICHBLMA');
    }

    /**
     * Đếm tổng lượt thích của bình luận
     *
     * @param string $maDanhGia Mã bình luận
     * @return int
     */
    public function countLike($maBinhLuan) {
        $this->db->where('MaBLMA', $maBinhLuan);

        return $this->db->get('THICHBLMA')->num_rows();
    }

    /**
     * Kiểm tra người dùng đang đăng nhập có like bình luận chưa
     *
     * @param string $maDanhGia Mã bình luận
     * @return boolean
     */
    public function isLiked($maBinhLuan) {
        $this->db->where('MaBLMA', $maBinhLuan);
        $this->db->where('TenDangNhap', $this->session->userdata('tenDangNhap'));

        return $this->db->get('THICHBLMA')->num_rows() == 1;
    }

    /**
     * Xóa tất cả lượt thích của bình luận
     *
     * @param string $maBinhLuan Mã bình luận
     * @return boolean
     */
    public function deleteAllLike($maBinhLuan) {
        $this->db->where('MaBLMA', $maBinhLuan);

        return $this->db->delete('THICHBLMA');
    }

    /**
     * Xóa một bình luận
     *
     * @param string $maBinhLuan Mã bình luận
     * @return void
     */
    public function delete($maBinhLuan) {
        $this->deleteAllLike($maBinhLuan);
        $this->db->where('MaBLMA', $maBinhLuan);

        return $this->db->delete('BINHLUANMA');
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
            $this->deleteAllLike($binhLuan['MaBLMA']);
        }

        $this->db->where('MaDGMA', $maDanhGia);
        return $this->db->delete('BINHLUANMA');
    }
}
?>