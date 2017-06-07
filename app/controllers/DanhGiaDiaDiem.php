<?php
class DanhGiaDiaDiem extends CI_Controller
{
    /**
     * Thêm một bình luận mới vào CSDL. Hàm này dùng cho AJAX. Phương thức POST.
     *
     * @return json
     */
    public function insertBinhLuan()
    {
        $binhLuan = $this->BinhLuanDD_model->selectBinhLuan($this->BinhLuanDD_model->insertBinhLuan());
        $user = $this->NguoiDung_model->select($binhLuan['TenDangNhap']);
        $img = $user['AnhDaiDien'];
        $ten = $user['TenNguoiDung'];
        
        echo '<div class="panel-footer cmt'.$binhLuan['MaBLDD'].'">
                <div class="media">
                    <!-- Ảnh đại diện -->
                    <div class="t-comment-avatar media-left">
                        <a href="'.base_url('trangCaNhan/danhGia/'.$binhLuan['TenDangNhap']).'">
                            <img src="'.($img ? base_url('assets/images/db/'.$img) : base_url('assets/images/app/user.jpg')).'">
                        </a>
                    </div>
                    <!-- Nội dung bình luận -->
                    <div class="media-body">
                        <div class="t-comment-heading">
                            <!-- Tên người dùng -->
                            <div class="t-danhgia-username pull-left"><a href="'.base_url('trangCaNhan/danhGia/'.$binhLuan['TenDangNhap']).'">'.$ten.'</a></div>
                            <div class="pull-right">
                                <!-- Ngày tháng -->
                                <div class="t-danhgia-date">'.date('H:i d/m/Y', strtotime($binhLuan['NgayTaoBLDD'])).'</div>
                                <!-- Nút xóa -->'.
                                ($this->session->userdata('logged_in') && ($this->session->userdata('tenDangNhap') == $binhLuan['TenDangNhap'] || $this->session->userdata('maQH') == 0)?
                                '<button title="Xóa" class="t-btn-delete" value="'.$binhLuan['MaBLDD'].'">
                                    <img src="'.base_url('assets/images/app/delete.png').'"></button>': '').
                            '</div>
                        </div>
                        <div class="t-comment-body">'.$binhLuan['NoiDungBLDD'].'</div>
                    </div> 
                    <!-- Like, count like -->
                    <div class="t-like-panel media-footer">'.($this->session->userdata('logged_in')?
                        '<button class="btn btn-default btn-xs like-comment" value="'.$binhLuan['MaBLDD'].'">
                            <img src="'.base_url('assets/images/app/like.png').'"> <span class="likeCmt'.$binhLuan['MaBLDD'].'">'.($this->BinhLuanDD_model->isLiked($binhLuan['MaBLDD']) ? 'Bỏ thích' : 'Thích').'</span>
                        </button>':'').
                        '<div class="t-like-count pull-right">
                            <img src="'.base_url('assets/images/app/like_num.png').'"> <span class="numLikeCmt'.$binhLuan['MaBLDD'].'">'.$binhLuan['TongLuotThichBLDD'].'</span>
                        </div>
                    </div>     
                </div>         
            </div>';
    }
    /**
     * Thích một bài đánh giá. Hàm này dùng cho AJAX. Phương thức POST
     *
     * @return text
     */
    public function likeReview()
    {
        if (!$this->DanhGiaDiaDiem_model->isLiked($_POST['MaDGDD'])) {
            $this->DanhGiaDiaDiem_model->like($_POST['MaDGDD']);
        }
        else {
            $this->DanhGiaDiaDiem_model->unlike($_POST['MaDGDD']);
        }
        echo $this->DanhGiaDiaDiem_model->countLike($_POST['MaDGDD']);
    }
    /**
     * Thích một bình luận. Hàm này dùng cho AJAX. Phương thức POST
     *
     * @return text
     */
    public function likeComment()
    {
        if (!$this->BinhLuanDD_model->isLiked($_POST['MaBLDD'])) {
            $this->BinhLuanDD_model->like($_POST['MaBLDD']);
        }
        else {
            $this->BinhLuanDD_model->unlike($_POST['MaBLDD']);
        }
        echo $this->BinhLuanDD_model->countLike($_POST['MaBLDD']);
    }
    /**
     * Xóa một bình luận. Hàm này dùng cho AJAX. Phương thức POST
     *
     * @return text
     */
    public function deleteComment()
    {
        $this->BinhLuanDD_model->delete($_POST['MaBLDD']);
    }
}