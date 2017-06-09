<?php
class DanhGiaMonAn_model extends CI_Model
{
    /**
     * Lấy bảng đánh giá trung bình của một món ăn
     *
     * @param string $maMonAn Mã địa điểm
     * @return array
     */
    public function selectBangDanhGia($maMonAn)
    {
        $this->db->where('MaMonAn', $maMonAn);
        $result = $this->db->get('DANHGIAMONAN')->result_array();

        $data = array (
            'HuongVi'    => 0,
            'CachTrinhBay' => 0,
            'GiaCaDGMA'     => 0,
            'DoHaiLong' => 0,
            'DiemTrungBinhDGMA' => 0
        );

        $count = count($result);
        if ($count == 0) {
            return $data;
        }

        for ($i = 0; $i < $count; $i++) {
            $data['HuongVi'] += $result[$i]['HuongVi'];
            $data['CachTrinhBay'] += $result[$i]['CachTrinhBay'];
            $data['GiaCaDGMA'] += $result[$i]['GiaCaDGMA'];
            $data['DoHaiLong'] += $result[$i]['DoHaiLong'];
            $data['DiemTrungBinhDGMA'] += $result[$i]['DiemTrungBinhDGMA'];
        }

        $data['HuongVi'] /= $count;
        $data['CachTrinhBay'] /= $count;
        $data['GiaCaDGMA'] /= $count;
        $data['DoHaiLong'] /= $count;
        $data['DiemTrungBinhDGMA'] /= $count;

        return $data;
    }

     /**
     * Lấy tổng bình luận của tất cả đánh giá trong món ăn
     *
     * @param string $maMonAn Mã món ăn
     * @return int
     */
    public function selectTongBinhLuan($maMonAn)
    {
        $this->db->select('*');
        $this->db->from('DANHGIAMONAN');
        $this->db->join('BINHLUANMA', 'DANHGIAMONAN.MaDGMA = BINHLUANMA.MaDGMA');
        $this->db->where('MaMonAn', $maMonAn);
        return $this->db->get()->num_rows();
    }

    /**
     * Lấy tổng bình luận của một đánh giá
     *
     * @param string $maDanhGia Mã đánh giá món ăn
     * @return int
     */
    public function selectTongBinhLuanDanhGia($maDanhGia) {
        $this->db->where('MaDGMA', $maDanhGia);

        return $this->db->get('BINHLUANMA')->num_rows();
    }

    /**
     * Lấy tổng đánh giá của một món ăn
     *
     * @param string $maMonAn Mã món ăn
     * @return int
     */
    public function selectTongDanhGia($maMonAn)
    {
        $this->db->where('MaMonAn', $maMonAn);
        
        return $this->db->get('DANHGIAMONAN')->num_rows();
    }

    /**
     * Lấy danh sách thông tin tất cả đánh giá của món ăn
     *
     * @param string $maMonAn Mã món ăn
     * @return array
     */
    public function selectAllDanhGia($maMonAn) {
        $this->db->where('MaMonAn', $maMonAn);
        $this->db->order_by('NgayTaoDGMA', 'desc');
        $query = $this->db->get('DANHGIAMONAN');

        return $query->result_array();
    }

    /**
     * Lấy danh sách thông tin tất cả các đánh giá theo người dùng
     *
     * @param string $tenDangNhap Tên đăng nhập
     * @return void
     */
    public function selectAllDanhGiaNguoiDung($tenDangNhap) {
        $this->db->where('TenDangNhap', $tenDangNhap);
        $this->db->order_by('NgayTaoDGMA', 'desc');

        return $this->db->get('DANHGIAMONAN')->result_array();
    }

    /**
     * Lấy thông tin một đánh giá
     *
     * @param string $maDanhGia Mã đánh giá
     * @return array
     */
    public function selectDanhGia($maDanhGia) {
        $this->db->where('MaDGMA', $maDanhGia);
        $query = $this->db->get('DANHGIAMONAN');

        return $query->row_array();
    }

    /**
     * Thêm đánh giá mới vào CSDL cho một món ăn. Dữ liệu được lấy thông quan $_POST
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return mixed Nếu thành công trả về id của đánh giá. Nếu không thành công trả về false.
     */
    public function insert($maMonAn) {
        $data = array (
            'TieuDeDGMA'          => $_POST['tieuDeDGMA'],
            'HuongVi'             => $_POST['huongVi'],
            'CachTrinhBay'        => $_POST['cachTrinhBay'],
            'GiaCaDGMA'           => $_POST['giaCaDGMA'],
            'DoHaiLong'           => $_POST['doHaiLong'],
            'BaiNhanXetDGMA'      => $_POST['baiNhanXetDGMA'],
            'NgayTaoDGMA'         => date('Y-m-d H:i:s'),
            'TongLuotThichDGMA'   => 0,
            'MaMonAn'             => $maMonAn,
            'TenDangNhap'         => $this->session->userdata('tenDangNhap')
        );

        $data['DiemTrungBinhDGMA'] = ($data['HuongVi'] + $data['CachTrinhBay'] + $data['GiaCaDGMA'] + $data['DoHaiLong']) / 4.0;
        
        $inserted = $this->db->insert('DANHGIAMONAN', $data);
        return $inserted ? $this->db->insert_id() : $inserted;
    }

    /**
     * Cập nhật thông tin một đánh giá. Dữ liệu được lấy thông qua $_POST
     *
     * @param string $maDanhGia Mã đánh giá
     * @return boolean
     */
    public function update($maDanhGia) {
        $data = array (
            'TieuDeDGMA'          => $_POST['tieuDeDGMA'],
            'HuongVi'             => $_POST['huongVi'],
            'CachTrinhBay'        => $_POST['cachTrinhBay'],
            'GiaCaDGMA'           => $_POST['giaCaDGMA'],
            'DoHaiLong'           => $_POST['doHaiLong'],
            'BaiNhanXetDGMA'      => $_POST['baiNhanXetDGMA']
        );

        $data['DiemTrungBinhDGMA'] = ($data['HuongVi'] + $data['CachTrinhBay'] + $data['GiaCaDGMA'] + $data['DoHaiLong']) / 4.0;
        
        $this->db->where('MaDGMA', $maDanhGia);
        return $this->db->update('DANHGIAMONAN', $data);
    }

    /**
     * Thích một bài đánh giá
     *
     * @param string $maDanhGia Mã đánh giá
     * @return boolean
     */
    public function like($maDanhGia) {
        $data = array (
            'MaDGMA'      => $maDanhGia,
            'TenDangNhap' => $this->session->userdata('tenDangNhap')
        );

        return $this->db->insert('THICHDGMA', $data);
    }

    /**
     * Bỏ thích một bài đánh giá
     *
     * @param string $maDanhGia Mã đánh giá
     * @return boolean
     */
    public function unlike($maDanhGia) {
        $this->db->where('MaDGMA', $maDanhGia);
        $this->db->where('TenDangNhap', $this->session->userdata('tenDangNhap'));

        return $this->db->delete('THICHDGMA');
    }

    /**
     * Đếm tổng lượt thích của bài đánh giá
     *
     * @param string $maDanhGia Mã đánh giá
     * @return int
     */
    public function countLike($maDanhGia) {
        $this->db->where('MaDGMA', $maDanhGia);

        return $this->db->get('THICHDGMA')->num_rows();
    }

    /**
     * Kiểm tra người dùng đang đăng nhập có like đánh giá chưa
     *
     * @param string $maDanhGia Mã đánh giá
     * @return boolean
     */
    public function isLiked($maDanhGia) {
        $this->db->where('MaDGMA', $maDanhGia);
        $this->db->where('TenDangNhap', $this->session->userdata('tenDangNhap'));

        return $this->db->get('THICHDGMA')->num_rows() == 1;
    }

    /**
     * Xóa tất cả lượt thích của đánh giá
     *
     * @param string $maDanhGia Mã bình luận
     * @return boolean
     */
    public function deleteAllLike($maDanhGia) {
        $this->db->where('MaDGMA', $maDanhGia);

        return $this->db->delete('THICHDGMA');
    }

    /**
     * Xóa một đánh giá
     *
     * @param string $maDanhGia Mã đánh giá
     * @return boolean
     */
    public function delete($maDanhGia) {
        $this->BinhLuanDD_model->deleteAllBinhLuan($maDanhGia);
        $this->deleteAllLike($maDanhGia);

        $this->db->where('MaDGMA', $maDanhGia);
        return $this->db->delete('DANHGIAMONAN');
    }

    /**
     * Xóa tất cả đánh giá của địa điểm
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return boolean
     */
    public function deleteAllDanhGia($maMonAn) {
        $cacDanhGia = $this->selectAllDanhGia($maMonAn);
        foreach($cacDanhGia as $danhGia) {
            $this->BinhLuanMA_model->deleteAllBinhLuan($danhGia['MaDGMA']);
            $this->deleteAllLike($danhGia['MaDGMA']);
        }
        
        $this->db->where('MaMonAn', $maMonAn);
        return $this->db->delete('DANHGIAMONAN');
    }

}
?>