<?php echo validation_errors(); ?>

<div class="commentForm">
	<h2>оставьте комментарий:</h2>
	<?php echo form_open(current_url()); ?>
		<?php echo form_input('name', set_value('name')); ?><?php echo form_label('name','name'); ?>
		<?php $this->load->view('comments/captcha');?>
		<?php echo form_textarea('comment', '', 'cols="90" rows="3"'); ?>
		<?php echo form_submit('submit', 'Post', 'id="send"'); ?>
	<?php echo form_close(); ?>
</div>
