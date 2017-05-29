<?php
class NguoiDung_model extends CI_Model
{
    public $tenDangNhap;
    public $tenNguoiDung;
    public $ngaySinh;
    public $gioiTinh;
    public $matKhau;
    public $email;
    public $gioiThieuBanThan;
    public $anhDaiDien;
    public $maQH;

    public function insert()
    {
        $this->tenDangNhap = $_POST['tenDangNhap'];
        $this->tenNguoiDung = $_POST['tenNguoiDung'];
        $this->ngaySinh = $_POST['ngaySinh'];
        $this->gioiTinh = $_POST['gioiTinh'];
        $this->matKhau = md5($_POST['matKhau']);
        $this->email = $_POST['email'];
        $this->gioiThieuBanThan = $_POST['gioiThieuBanThan'];
        $this->anhDaiDien = $_POST['anhDaiDien'];
        $this->maQH = 1;

        $inserted = $this->db->insert('NGUOIDUNG', $this);
        return $inserted;
    }

    public function select($tenDangNhap)
    {
        $this->db->where('tenDangNhap', $tenDangNhap);
        $query = $this->db->get('NGUOIDUNG');

        return $query->row_array();
    }

    public function login($tenDangNhap, $matKhau)
    {
        $enc_matKhau = md5($matKhau);

        $this->db->where('tenDangNhap', $tenDangNhap);
        $this->db->where('matKhau', $enc_matKhau);

        $query = $this->db->get('NGUOIDUNG');
        if ($query->num_rows() === 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
