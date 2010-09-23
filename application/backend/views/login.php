<div id = "form">
	<?php echo validation_errors(); ?>

	<?php echo form_open(current_url()); ?>
	<table class="create-user">
		<tr>
			<td class="name"><?php echo form_label('Логин','login'); ?></td>		
			<td><?php echo form_input('login'); ?></td>
		</tr>
	
		<tr>
			<td><?php echo form_label('Пароль','password'); ?></td>
			<td><?php echo form_password('password'); ?></td>
		</tr>
	</table>
	<?php echo form_submit('submit', 'Войти'); ?>
	
	<?php echo form_close(); ?>
</div>
