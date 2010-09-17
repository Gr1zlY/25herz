<?php echo validation_errors(); ?>

<div class="commentForm">
	<h2>оставьте комментарий:</h2>
	<?php echo form_open(current_url()); ?>

		<?php if($this->session->userdata('logged_in') != TRUE): ?>
			<?php echo form_input('name', set_value('name')); ?><?php echo form_label('name','name'); ?>
			<?php $this->load->view('comments/captcha');?>
		<?php endif; ?>

	<textarea cols="30"  rows="3" name ="comment"></textarea>
		<?php echo form_submit('submit', 'Post', 'id="send"'); ?>
	<?php echo form_close(); ?>
</div>
