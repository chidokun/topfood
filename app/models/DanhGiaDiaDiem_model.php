<?php
class DanhGiaDiaDiem_model extends CI_Model
{
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

    public function selectTongBinhLuan($maDiaDiem)
    {
        $this->db->select('*');
        $this->db->from('DANHGIADIADIEM');
        $this->db->join('BINHLUANDD', 'DANHGIADIADIEM.MaDGDD = BINHLUANDD.MaDGDD');
        $this->db->where('MaDiaDiem', $maDiaDiem);
        return $this->db->get()->num_rows();
    }

    public function selectTongDanhGia($maDiaDiem)
    {
        $this->db->where('MaDiaDiem', $maDiaDiem);
        
        return $this->db->get('DANHGIADIADIEM')->num_rows();
    }

    public function insert($maDiaDiem) {
        $data = array (
            'TieuDeDGDD'          => $_POST['tieuDeDGDD'],
            'PhucVu'              => $_POST['phucVu'] / 10.0,
            'ChatLuong'           => $_POST['chatLuong'] / 10.0,
            'ViTri'               => $_POST['viTri'] / 10.0,
            'KhongGian'           => $_POST['khongGian'] / 10.0,
            'GiaCaDGDD'           => $_POST['giaCaDGDD'] / 10.0,
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

    public function selectAllDanhGia($maDiaDiem) {
        $this->db->where('MaDiaDiem', $maDiaDiem);
        $query = $this->db->get('DANHGIADIADIEM');

        return $query->result_array();
    }

    public function selectDanhGia($maDanhGia) {
        $this->db->where('MaDGDD', $maDanhGia);
        $query = $this->db->get('DANHGIADIADIEM');

        return $query->row_array();
    }

    public function update($maDanhGia) {
        $data = array (
            'TieuDeDGDD'          => $_POST['tieuDeDGDD'],
            'PhucVu'              => $_POST['phucVu'] / 10.0,
            'ChatLuong'           => $_POST['chatLuong'] / 10.0,
            'ViTri'               => $_POST['viTri'] / 10.0,
            'KhongGian'           => $_POST['khongGian'] / 10.0,
            'GiaCaDGDD'           => $_POST['giaCaDGDD'] / 10.0,
            'BaiNhanXetDGDD'      => $_POST['baiNhanXetDGDD'],
        );

        $data['DiemTrungBinhDGDD'] = ($data['PhucVu'] + $data['ChatLuong'] + $data['ViTri'] + $data['KhongGian'] + $data['GiaCaDGDD']) / 5.0;
        
        $this->db->where('MaDGDD', $maDanhGia);
        return $this->db->update('DANHGIADIADIEM', $data);
    }
}
