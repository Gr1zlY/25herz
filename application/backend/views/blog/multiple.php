<div id="body">
	<ul class="submenu">
		<li class="chosen">Posts</li>
		<li><?php echo anchor('admin/viewcomments', 'Comments');?></li>
		<li><?php echo anchor('authorization/members', 'Users');?></li>
		<li><?php echo anchor('category', 'Categories');?></li>
	</ul>

	<div class="list">
		<table>
			<tr class="list-head">
				<td class="list-id">#</td><td>contents</td>
			</tr>
		        <?php if($posts != FALSE): ?>
				<?php foreach($posts as $preview): ?>
					<tr class="list-row">
						<td class="list-id"><?php echo $preview['id'];?></td>
						<td>
							<h4><?php echo $preview['title'];?></h4>
							<p><?php echo $preview['preview']; ?></p>
							<div class="actions">
								<?php echo anchor('admin/editpost/'.$preview['id'], ' ', 'class="action-edit"');?>
								<?php echo anchor('admin/delete/'.$preview['id'], ' ' ,'class="action-delete"');?>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif;?>
		</table>
	</div>
</div>