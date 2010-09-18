<div id="body">
	<ul class="submenu">
		<li><?php echo anchor('admin/posts', 'Posts');?>
		<li><?php echo anchor('admin/viewcomments', 'Comments');?></li>
		<li><?php echo anchor('authorization/members', 'Users');?></li>
		<li>Categories</li>
	</ul>

	<div class="list">
		<table>
			<tr class="list-head">
				<td class="list-id">#</td><td>Title</td><td>Link</td><td>actions</td>
			</tr>
			<?php if(isset($categories) AND $categories != FALSE):?>
				<?php foreach($categories as $category): ?>
					<tr class="list-row">
						<td class="list-id"><?php echo $category['id']; ?></td>
						<td><?php echo $category['ctitle']; ?></td>
						<td><?php echo $category['clink']; ?></td>
						<td>
							<div class="actions">
								<?php echo anchor('category/edit/'.$category['id'], ' ', 'class="action-edit"');?>
								<?php echo anchor('category/delete/'.$category['id'], ' ' ,'class="action-delete"');?>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif;?>
		</table>
	</div>
</div>