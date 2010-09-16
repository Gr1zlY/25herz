<div id = "form">
	<?php echo validation_errors(); ?>

	<?php echo form_open(current_url()); ?>
	
		<?php echo form_label('Имя','name'); ?>
		<?php echo form_input('name', set_value('name')); ?><br />
		
		<?php echo form_label('Логин','login'); ?>
		<?php echo form_input('login', set_value('login')); ?><br />

		<?php echo form_label('Email','email'); ?>
		<?php echo form_input('email', set_value('email')); ?><br />
		
		<?php echo form_label('Пароль','password'); ?>
		<?php echo form_password('password'); ?><br />
	
		<?php echo form_label('Подтверж. пароля','passconf'); ?>
		<?php echo form_password('passconf'); ?><br />
		
		<?php echo form_submit('submit', 'Создать', 'class = "submit"'); ?>
	
	<?php echo form_close(); ?>
</div>
