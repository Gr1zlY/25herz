<div id="body">
	<ul class="submenu">
		<li><?php echo anchor('admin/posts', 'Posts');?>
		<li class="chosen">Comments</li>
		<li><?php echo anchor('authorization/members', 'Users');?></li>
		<li><?php echo anchor('category', 'Categories');?></li>
	</ul>

	<div class="list">
		<table>
			<tr class="list-head">
				<td class="list-id">#</td><td>contents</td>
			</tr>
			<?php if(isset($comments) AND $comments != FALSE):?>
				<?php foreach($comments as $comment):?>
					<tr class="list-row">
						<td class="list-id"><?php echo $comment['id']; ?></td>
						<td>
							<h4><?php echo $comment['name']; ?></h4>
							<p><?php echo $comment['comment'];?></p>
							<div class="actions">
								<?php echo anchor('admin/deletecomment/'.$comment['id'], ' ' ,'class="action-delete"');?>
							</div>
						</td>
					</tr>
				<?php endforeach;?>
			<?php endif;?>
		</table>
	</div>
</div>