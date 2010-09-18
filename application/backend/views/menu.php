<?php if($this->session->userdata('logged_in') == TRUE):?>
	<div class="admin-menu">
		<ul class="menu">
			<li><a href="/25herz/index.php">View Site</a></li>
			<li><?php echo anchor('admin/newpost', 'Create');?></li>
			<li><?php echo anchor('admin/posts', 'Manage');?></li>
		</ul>
	</div>
<?php endif;?>