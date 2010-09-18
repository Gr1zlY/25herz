<?php echo validation_errors(); ?>

<div class="commentForm">
	<h2>оставьте комментарий:</h2>
	<?php echo form_open(current_url());?>
	<?php echo form_input(array('type'=>'hidden', 'name'=>'parent_id', 'id'=>'parent-id')); ?>
	
	<table>
		<?php if($this->session->userdata('logged_in') != TRUE): ?>
		<tr><td>	
			<?php echo form_input('name', set_value('name')); ?>
			<?php echo form_label('name','name'); ?>
		</td></tr>
		<tr><td>
			<?php $this->load->view('comments/captcha');?>
		</td></tr>
		<?php endif; ?>
		<tr><td>
			<textarea cols="30"  rows="3" name ="comment"></textarea>
		</td></tr>
		<tr><td>
			<?php echo form_submit('submit', 'Post', 'id="send"'); ?>
		</td></tr>
	</table>
	<?php echo form_close(); ?>
</div>
