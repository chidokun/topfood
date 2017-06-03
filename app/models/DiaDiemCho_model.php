<?php
class DiaDiemCho_model extends CI_Model
{
    public function updateTrangThai($maDiaDiem)
        # code...
        $data = array(
            'TrangThai' => 1
        );
        $this->db->where('MaDiaDiem', $maDiaDiem);
        return $this->db->update('DIADIEM', $data);
    }
}