<?php echo validation_errors(); ?>

<script type="text/javascript" language="javascript" charset="utf-8">
	$(function() {
		$("#newComment").click(function(){
			$("#comments").append($('.commentForm'));
			$('#parent-id').val(0);
			return false;
		});
	});
</script>

<h2 id="newComment"><a href="#">оставьте комментарий:</a></h2>
<?php echo form_open(current_url(), array('class'=>'commentForm'));?>
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
