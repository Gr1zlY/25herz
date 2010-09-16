<div id="form">

	<?php if($this->session->flashdata('success') !=  FALSE): ?>
		<div id = "message"><?php echo $this->session->flashdata('success');?></div>
	<?php endif;?>	
	
	<?php echo validation_errors(); ?>
	
	<?php echo form_open(current_url()); ?>
		<?php echo form_label('Post title','title'); ?><?php echo form_input('title', $post['title']); ?><br />
		<?php echo form_label('Link','link'); ?><?php echo form_input('link', $post['link']); ?><br />
		<br />
		<?php echo form_label('Meta tags','meta_tags'); ?><?php echo form_input('meta_tags', $post['meta_tags']); ?><br />
		<?php echo form_label('Meta description','meta_description'); ?><?php echo form_input('meta_description', $post['meta_description']); ?><br />
		<br />
		<?php echo form_label('Categories','categories'); ?>
			<select name = "categories">
				<?php foreach($categories as $category): ?>
					<option value="<?php echo $category['id']; ?>" <?php if($post['category'] == $category['id']) echo 'selected'; ?>><?php echo $category['ctitle']; ?></option>
				<?php endforeach; ?>
			</select>
		<br />
		<br />
		<?php echo form_textarea('preview', $post['preview'], 'cols="90" rows="3"'); ?><br />
		<?php echo form_textarea('post', $post['post'], 'cols="90" rows="3"'); ?><br />
		
		<?php echo form_submit('submit', 'Save', 'class = "submit"'); ?>	
	<?php echo form_close(); ?>
</div>
