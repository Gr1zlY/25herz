<div id="body">
	<ul class="submenu">
		<li class="chosen">Post</li>
		<li><?php echo anchor('authorization/createaccount', 'User');?></li>
	</ul>

  	<?php echo validation_errors(); ?>
	<?php echo form_open(current_url()); ?>
		<table class="create-post">
			<tr>
				<td colspan=4>
					<h3>Title:</h3>
					<?php echo form_input('title','','class="post-title"'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<h3>Link slug:</h3>
					<?php echo form_input('link','','class="post-input"'); ?>
				</td>
				<td>
					<h3>Tags:</h3>
					<?php echo form_input('meta_tags','','class="post-input"'); ?>
				</td>
				<td>
					<h3>meta-desription:</h3>
					<?php echo form_input('meta_description','','class="post-input"'); ?>
				</td>
				<td>
					<h3>Category:</h3>
					<select name = "categories"  class="post-input">
						<?php foreach($categories as $category): ?>
							<option value="<?php echo $category['id']; ?>"><?php echo $category['ctitle']; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
		</table>
		<h3>Text:</h3>
		<?php echo form_textarea('preview','', 'class="post-body"'); ?>
		<?php echo form_textarea('post', '', 'class="post-body"'); ?><br />

		<?php echo form_submit('submit', 'Post it!', 'class="post-submit"'); ?>
	<?php echo form_close(); ?>
</div>