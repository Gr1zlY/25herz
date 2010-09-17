<div id="body">
	<ul class="submenu">
		<li><?php echo anchor('admin/posts', 'Posts');?></li>
		<li><?php echo anchor('admin/viewcomments', 'Comments');?></li>
		<li class="chosen">Users</li>
	</ul>

	<?php echo validation_errors(); ?>
	<?php echo form_open(current_url()); ?>
		<table class="create-user">
			<tr>
				<td class="name"><label for="user-login">Login</label></td>
				<td><?php echo form_input('login', $login,'id="user-login"'); ?></td>
			</tr>
			<tr>
				<td class="name"><label for="user-name">Name</label></td>
				<td><?php echo form_input('name', $name, ' id="user-name"'); ?></td>
			</tr>
			<tr>
				<td class="name"><label for="user-email">Email</label></td>
				<td><?php echo form_input('email', $email, 'id="user-email"'); ?></td>
			</tr>
			<tr>
				<td class="name"><label for="user-password">New Password</label></td>
				<td><?php echo form_password('password', '', 'id="user-password"'); ?></td>
			</tr>
			<tr>
				<td class="name"><label for="user-password">Confirm Password</label></td>
				<td><?php echo form_password('passconf', '', 'id="user-password"'); ?></td>
			</tr>
		</table>
		<?php echo form_submit('submit', 'Update', 'class="post-submit"'); ?>
	<?php echo form_close(); ?>
</div>

