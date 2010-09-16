<div id = "form">
	<?php echo validation_errors(); ?>

	<?php echo form_open(current_url()); ?>
	
		<?php echo form_label('Логин','login'); ?>
		<?php echo form_input('login'); ?><br />
		
		<?php echo form_label('Пароль','password'); ?>
		<?php echo form_password('password'); ?><br />
	
		<?php echo form_submit('submit', 'Войти'); ?>
	
	<?php echo form_close(); ?>
</div>
