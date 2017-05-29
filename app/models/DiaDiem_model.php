<?php
class DiaDiem_model extends CI_Model
{
    public $maDiaDiem;
    public $tenDiaDiem;
    public $diaChi;
    public $soDT;
    public $emailDD;
    public $website;
    public $gioMoCua;
    public $gioDongCua;
    public $moTaDD;
    public $anhDaiDienDD;
    public $ngayTaoDD;
    public $diemTrungBinhDD;
    public $trangThai;
    public $tenDangNhap;

    public function insert()
    {
        $this->tenDiaDiem = $_POST['tenDiaDiem'];
        $this->diaChi = $_POST['diaChi'];
        $this->soDT = $_POST['soDT'];
        $this->emailDD = $_POST['emailDD'];
        $this->website = $_POST['website'];
        $this->gioMoCua = $_POST['gioMoCua'];
        $this->gioDongCua = $_POST['gioDongCua'];
        $this->moTaDD = $_POST['moTaDD'];
        $this->anhDaiDienDD = $_POST['anhDaiDienDD'];
        $this->ngayTaoDD = date('Y-m-d H:i:s');
        $this->diemTrungBinhDD = 0;
        $this->trangThai = 0;
        $this->tenDangNhap = $this->session->userdata('tenDangNhap');

        $inserted = $this->db->insert('DIADIEM', $this);
        return $inserted;
    }

    public function select($maDiaDiem)
    {
        $this->db->where('maDiaDiem', $maDiaDiem);
        $query = $this->db->get('DIADIEM');

        return $query->row_array();
    }
}
