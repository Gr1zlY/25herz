<div id="body">
	<ul class="submenu">
		<li><?php echo anchor('admin/newpost', 'Post');?></li>
		<li>User</li>
		<li><?php echo anchor('category/newcategory', 'Category');?></li>
	</ul>

	<?php echo validation_errors(); ?>
	<?php echo form_open(current_url()); ?>
		<table class="create-user">
			<tr>
				<td class="name"><label for="user-login">Login</label></td>
				<td><?php echo form_input('login', set_value('login'),'' ,'id="user-login"'); ?></td>
			</tr>
			<tr>
				<td class="name"><label for="user-name">Name</label></td>
				<td><?php echo form_input('name', set_value('name'), '', ' id="user-name"'); ?></td>
			</tr>
			<tr>
				<td class="name"><label for="user-email">Email</label></td>
				<td><?php echo form_input('email', set_value('email'), '', 'id="user-email"'); ?></td>
			</tr>
			<tr>
				<td class="name"><label for="user-password">Password</label></td>
				<td><?php echo form_password('password', '', 'id="user-password"'); ?></td>
			</tr>
			<tr>
				<td class="name"><label for="user-password">Password</label></td>
				<td><?php echo form_password('passconf', '', 'id="user-password"'); ?></td>
			</tr>
		</table>
		<?php echo form_submit('submit', 'Create', 'class="post-submit"'); ?>
	<?php echo form_close(); ?>
</div>

