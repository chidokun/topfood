<div class="panel panel-default">
    <div class="panel-heading t-panel-header">
	    Hình ảnh món ăn
    </div>
    <div class="panel-body">
        <?php if (count($listImg) == 0): ?>
			<p class='alert alert-dismissable alert-success'>Chưa có hình ảnh.</p>
		<?php else : ?>
			<div class="row">
				<?php foreach ($listImg as $img): ?>
					<div class="col-md-4">
						<div class="thumbnail">
							<img src=<?php echo base_url('assets/images/db/'.$img['PathMA']); ?>>
						</div>
					</div> 
				<?php endforeach; ?>	
			</div>
		<?php endif; ?>	      
    </div>
</div>