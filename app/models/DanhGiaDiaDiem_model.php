<?php
class DanhGiaDiaDiem_model extends CI_Model
{
    /**
     * Lấy bảng đánh giá trung bình của một địa điểm
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return array
     */
    public function selectBangDanhGia($maDiaDiem)
    {
        $this->db->where('MaDiaDiem', $maDiaDiem);
        $result = $this->db->get('DANHGIADIADIEM')->result_array();

        $data = array (
            'PhucVu'    => 0,
            'ChatLuong' => 0,
            'ViTri'     => 0,
            'KhongGian' => 0,
            'GiaCaDGDD' => 0,
            'DiemTrungBinhDGDD' => 0
        );

        $count = count($result);
        if ($count == 0) {
            return $data;
        }

        for ($i = 0; $i < $count; $i++) {
            $data['PhucVu'] += $result[$i]['PhucVu'];
            $data['ChatLuong'] += $result[$i]['ChatLuong'];
            $data['ViTri'] += $result[$i]['ViTri'];
            $data['KhongGian'] += $result[$i]['KhongGian'];
            $data['GiaCaDGDD'] += $result[$i]['GiaCaDGDD'];
            $data['DiemTrungBinhDGDD'] += $result[$i]['DiemTrungBinhDGDD'];
        }

        $data['PhucVu'] /= $count;
        $data['ChatLuong'] /= $count;
        $data['ViTri'] /= $count;
        $data['KhongGian'] /= $count;
        $data['GiaCaDGDD'] /= $count;
        $data['DiemTrungBinhDGDD'] /= $count;

        return $data;
    }

    /**
     * Lấy tổng bình luận của tất cả đánh giá trong địa điểm
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return int
     */
    public function selectTongBinhLuan($maDiaDiem)
    {
        $this->db->select('*');
        $this->db->from('DANHGIADIADIEM');
        $this->db->join('BINHLUANDD', 'DANHGIADIADIEM.MaDGDD = BINHLUANDD.MaDGDD');
        $this->db->where('MaDiaDiem', $maDiaDiem);
        return $this->db->get()->num_rows();
    }

    /**
     * Lấy tổng bình luận của một đánh giá
     *
     * @param string $maDanhGia Mã đánh giá địa điểm
     * @return int
     */
    public function selectTongBinhLuanDanhGia($maDanhGia) {
        $this->db->where('MaDGDD', $maDanhGia);

        return $this->db->get('BINHLUANDD')->num_rows();
    }

    /**
     * Lấy tổng đánh giá của một địa điểm
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return int
     */
    public function selectTongDanhGia($maDiaDiem)
    {
        $this->db->where('MaDiaDiem', $maDiaDiem);
        
        return $this->db->get('DANHGIADIADIEM')->num_rows();
    }

    /**
     * Thêm đánh giá mới vào CSDL theo một địa điểm. Dữ liệu được lấy thông quan $_POST
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return mixed Nếu thành công trả về id của đánh giá. Nếu không thành công trả về false.
     */
    public function insert($maDiaDiem) {
        $data = array (
            'TieuDeDGDD'          => $_POST['tieuDeDGDD'],
            'PhucVu'              => $_POST['phucVu'],
            'ChatLuong'           => $_POST['chatLuong'],
            'ViTri'               => $_POST['viTri'],
            'KhongGian'           => $_POST['khongGian'],
            'GiaCaDGDD'           => $_POST['giaCaDGDD'],
            'BaiNhanXetDGDD'      => $_POST['baiNhanXetDGDD'],
            'NgayTaoDGDD'         => date('Y-m-d H:i:s'),
            'TongLuotThichDGDD'   => 0,
            'MaDiaDiem'           => $maDiaDiem,
            'TenDangNhap'         => $this->session->userdata('tenDangNhap')
        );

        $data['DiemTrungBinhDGDD'] = ($data['PhucVu'] + $data['ChatLuong'] + $data['ViTri'] + $data['KhongGian'] + $data['GiaCaDGDD']) / 5.0;
        
        $inserted = $this->db->insert('DANHGIADIADIEM', $data);
        return $inserted ? $this->db->insert_id() : $inserted;
    }

    /**
     * Lấy danh sách thông tin tất cả đánh giá của địa điểm
     *
     * @param string $maDiaDiem Mã địa điểm
     * @return array
     */
    public function selectAllDanhGia($maDiaDiem) {
        $this->db->where('MaDiaDiem', $maDiaDiem);
        $query = $this->db->get('DANHGIADIADIEM');

        return $query->result_array();
    }

    /**
     * Lấy thông tin một đánh giá
     *
     * @param string $maDanhGia Mã đánh giá
     * @return array
     */
    public function selectDanhGia($maDanhGia) {
        $this->db->where('MaDGDD', $maDanhGia);
        $query = $this->db->get('DANHGIADIADIEM');

        return $query->row_array();
    }

    /**
     * Cập nhật thông tin một đánh giá. Dữ liệu được lấy thông qua $_POST
     *
     * @param string $maDanhGia Mã đánh giá
     * @return boolean
     */
    public function update($maDanhGia) {
        $data = array (
            'TieuDeDGDD'          => $_POST['tieuDeDGDD'],
            'PhucVu'              => $_POST['phucVu'],
            'ChatLuong'           => $_POST['chatLuong'],
            'ViTri'               => $_POST['viTri'],
            'KhongGian'           => $_POST['khongGian'],
            'GiaCaDGDD'           => $_POST['giaCaDGDD'],
            'BaiNhanXetDGDD'      => $_POST['baiNhanXetDGDD'],
        );

        $data['DiemTrungBinhDGDD'] = ($data['PhucVu'] + $data['ChatLuong'] + $data['ViTri'] + $data['KhongGian'] + $data['GiaCaDGDD']) / 5.0;
        
        $this->db->where('MaDGDD', $maDanhGia);
        return $this->db->update('DANHGIADIADIEM', $data);
    }
}