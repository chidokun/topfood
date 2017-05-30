<?php
class NguoiDung_model extends CI_Model
{
    /**
     * Chèn một người dùng mới. Sử dụng $_POST để truyền thông tin
     *
     * @return void
     */
    public function insert()
    {
        $data = array (
            'TenDangNhap' => $_POST['tenDangNhap'],
            'TenNguoiDung' => $_POST['tenNguoiDung'],
            'NgaySinh' => $_POST['ngaySinh'],
            'GioiTinh' => $_POST['gioiTinh'],
            'MatKhau' => md5($_POST['matKhau']),
            'Email' => $_POST['email'],
            'GioiThieuBanThan' => $_POST['gioiThieuBanThan'],
            'AnhDaiDien' => $_POST['anhDaiDien'],
            'MaQH' => 1
        );
        $inserted = $this->db->insert('NGUOIDUNG', $data);
        return $inserted;
    }

    /**
     * Lấy thông tin một người dùng.
     *
     * @param string $tenDangNhap Tên đăng nhập
     * @return array Mảng thông tin người dùng
     */
    public function select($tenDangNhap)
    {
        $this->db->where('tenDangNhap', $tenDangNhap);
        $query = $this->db->get('NGUOIDUNG');

        return $query->row_array();
    }

    /**
     * Kiểm tra đăng nhập
     *
     * @param string $tenDangNhap Tên đăng nhập
     * @param string $matKhau Mật khẩu chưa mã hóa
     * @return boolean Trả về TRUE nếu hợp lệ và FALSE nếu không hợp lệ
     */
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
