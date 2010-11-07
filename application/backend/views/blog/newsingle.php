<div id="body">
	<ul class="submenu">
		<li class="chosen">Post</li>
		<li><?php echo anchor('authorization/createaccount', 'User');?></li>
		<li><?php echo anchor('category/newcategory', 'Category');?></li>
	</ul>

  	<?php echo validation_errors(); ?>
	<?php echo form_open(current_url()); ?>
		<script>
			$(document).ready(function(){
				$("input[name='title']").syncTranslit({destination: 'linkslug'});
			});
		</script>
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
					<?php echo form_input('link','','class="post-input" id = "linkslug"'); ?>
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
			<tr class="options">
				<td colspan=4>	
					<h3>Options:</h3>
					<ul>
						<li><?php echo form_checkbox('draft', TRUE, FALSE);?><label for="draft">draft</label></li>
						<li><?php echo  form_checkbox('disallow_comments', TRUE, FALSE);?><label for="allow-comments">disallow comments</label></li>
						<!--<li><?php form_checkbox('','access right', FALSE);?><input id="access-rights" type="text"><label for="access-rights">access rights</label></li>-->
					</ul>
				</td>
			</tr>
		</table>
		<h3>Text:</h3>
		<?php echo form_textarea('preview','', 'class="post-body"'); ?>
		<?php echo form_textarea('post', '', 'class="post-body"'); ?>
		<br>
		<?php echo form_submit('submit', 'Post it!', 'class="post-submit"'); ?>
		<?php echo form_close(); ?>
</div>