<div>
    <div class="col-md-8" style="padding: 5px">
        <div style="margin-bottom:5px; height: 350px; margin-bottom:10px">
            <?php $this->load->view($diadiem_moi); ?>
        </div>
        <div style="margin-bottom:5px; height:280px;">
            <?php $this->load->view($diadiem_dexuat); ?>
        </div>
        <div style="margin-bottom:5px; height:280px;">
            <?php $this->load->view($review_moinhat); ?>
        </div>
        <div>
        </div>
    </div>
    <div class="col-md-4" style="padding: 5px">
        <?php $this->load->view($diadiem_luotthichnhieunhat); ?>
    </div>
</div>