<div id="body">
	<ul class="submenu">
		<li class="chosen">Posts</li>
		<li><?php echo anchor('admin/viewcomments', 'Comments');?></li>
		<li><?php echo anchor('authorization/members', 'Users');?></li>
		<li>Categories</li>
	</ul>

	<?php echo validation_errors(); ?>
	<?php echo form_open(current_url()); ?>
		<table class="create-user">
			<tr>
				<td class="name"><label for="user-login">Title</label></td>
				<td><?php echo form_input('ctitle', $ctitle,'id="user-login"'); ?></td>
			</tr>
			<tr>
				<td class="name"><label for="user-name">Link</label></td>
				<td><?php echo form_input('clink', $clink, ' id="user-name"'); ?></td>
			</tr>
			<tr>
				<td class="name"><label for="user-email">Meta Tags</label></td>
				<td><?php echo form_input('meta_tags', $meta_tags, 'id="user-email"'); ?></td>
			</tr>
			<tr>
				<td class="name"><label for="user-password">Description</label></td>
				<td><?php echo form_textarea('meta_description', $meta_description, 'id="user-password"'); ?></td>
			</tr>
		</table>
		<?php echo form_submit('submit', 'Update', 'class="post-submit"'); ?>
	<?php echo form_close(); ?>
</div>