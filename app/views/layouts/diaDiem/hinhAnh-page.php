<div class="panel panel-default">
    <div class="panel-heading t-panel-header" style="overflow: auto;">
	    <div class="pull-left">Danh mục hình ảnh</div>
	    <div class="pull-right">
	    	<button class="btn btn-default t-btn-default" style="margin: -8px 0 -4px; height: 30px; font-size: 90%;">
			<span class="glyphicon glyphicon-plus"></span> Thêm hình ảnh
			</button>
	    </div>	
    </div>
    <div class="panel-body">
		<?php if (count($listImg) == 0): ?>
			<p class='alert alert-dismissable alert-success'>Chưa có hình ảnh.</p>
		<?php else : ?>
			<div class="row">
				<?php foreach ($listImg as $img): ?>
					<div class="col-md-4">
						<div class="thumbnail">
							<img src=<?php echo base_url('assets/images/db/'.$img['PathDD']); ?>>
						</div>
					</div> 
				<?php endforeach; ?>	
			</div>
		<?php endif; ?>	
    </div>
</div>