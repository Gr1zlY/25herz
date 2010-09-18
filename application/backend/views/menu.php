<?php if($this->session->userdata('logged_in') == TRUE):?>
	<div class="admin-menu">
		<ul class="menu">
			<li><a href="localhost/25herz/index.php">View Site</a></li>
			<li><?php echo anchor('admin/newpost', 'Create');?></li>
			<li><?php echo anchor('admin/posts', 'Manage');?></li>
			<li><?php echo anchor('authorization/logout', 'Logout');?></li>
		</ul>
	</div>
<?php endif;?>