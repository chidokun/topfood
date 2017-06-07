<?php
class DanhGiaMonAn extends CI_Controller
{
    /**
     * Thêm một bình luận mới vào CSDL. Hàm này dùng cho AJAX. Phương thức POST.
     *
     * @return json
     */
    public function insertBinhLuan()
    {
        $binhLuan = $this->BinhLuanMA_model->selectBinhLuan($this->BinhLuanMA_model->insertBinhLuan());
        $user = $this->NguoiDung_model->select($binhLuan['TenDangNhap']); 
        
        echo '<div class="panel-footer cmt'.$binhLuan['MaBLMA'].'">
                <div class="media">
                    <!-- Ảnh đại diện -->
                    <div class="t-comment-avatar media-left">
                        <img src="'.base_url('assets/images/db/'.$user['AnhDaiDien']).'">
                    </div>
                    <!-- Nội dung bình luận -->
                    <div class="media-body">
                        <div class="t-comment-heading">
                            <!-- Tên người dùng -->
                            <div class="t-danhgia-username pull-left">'.$user['TenNguoiDung'].'</div>
                            <div class="pull-right">
                                <!-- Ngày tháng -->
                                <div class="t-danhgia-date">'.date('H:i d/m/Y', strtotime($binhLuan['NgayTaoBLMA'])).'</div>
                                <!-- Nút xóa -->'.
                                ($this->session->userdata('logged_in') && ($this->session->userdata('tenDangNhap') == $binhLuan['TenDangNhap'] || $this->session->userdata('maQH') == 0)?
                                '<button title="Xóa" class="t-btn-delete" value="'.$binhLuan['MaBLMA'].'">
                                    <img src="'.base_url('assets/images/app/delete.png').'"></button>': '').
                            '</div>
                        </div>
                        <div class="t-comment-body">'.$binhLuan['NoiDungBLMA'].'</div>
                    </div> 
                    <!-- Like, count like -->
                    <div class="t-like-panel media-footer">'.($this->session->userdata('logged_in')?
                        '<button class="btn btn-default btn-xs like-comment" value="'.$binhLuan['MaBLMA'].'">
                            <img src="'.base_url('assets/images/app/like.png').'"> <span class="likeCmt'.$binhLuan['MaBLMA'].'">'.($this->BinhLuanMA_model->isLiked($binhLuan['MaBLMA']) ? 'Bỏ thích' : 'Thích').'</span>
                        </button>':'').
                        '<div class="t-like-count pull-right">
                            <img src="'.base_url('assets/images/app/like_num.png').'"> <span class="numLikeCmt'.$binhLuan['MaBLMA'].'">'.$binhLuan['TongLuotThichBLMA'].'</span>
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
        if (!$this->DanhGiaMonAn_model->isLiked($_POST['MaDGMA'])) {
            $this->DanhGiaMonAn_model->like($_POST['MaDGMA']);
        }
        else {
            $this->DanhGiaMonAn_model->unlike($_POST['MaDGMA']);
        }
        echo $this->DanhGiaMonAn_model->countLike($_POST['MaDGMA']);
    }
    /**
     * Thích một bình luận. Hàm này dùng cho AJAX. Phương thức POST
     *
     * @return text
     */
    public function likeComment()
    {
        if (!$this->BinhLuanMA_model->isLiked($_POST['MaBLMA'])) {
            $this->BinhLuanMA_model->like($_POST['MaBLMA']);
        }
        else {
            $this->BinhLuanMA_model->unlike($_POST['MaBLMA']);
        }
        echo $this->BinhLuanMA_model->countLike($_POST['MaBLMA']);
    }
    /**
     * Xóa một bình luận. Hàm này dùng cho AJAX. Phương thức POST
     *
     * @return text
     */
    public function deleteComment()
    {
        $this->BinhLuanMA_model->delete($_POST['MaBLMA']);
    }
}