<div id="body">
	<ul class="submenu">
		<li><?php echo anchor('admin/posts', 'Posts');?></li>
		<li><?php echo anchor('admin/viewcomments', 'Comments');?></li>
		<li class="chosen">Users</li>
	</ul>

	<div class="list">
		<table>
			<tr class="list-head">
				<td class="list-id">#</td><td>name</td><td>login</td><td>email</td><td>actions</td>
			</tr>
			<?php if(isset($members) AND $members != FALSE):?>
				<?php foreach($members as $member): ?>
					<tr class="list-row">
						<td class="list-id"><?php echo $member['id']; ?></td>
						<td><?php echo $member['name']; ?></td>
						<td><?php echo $member['login']; ?></td>
						<td><?php echo $member['email']; ?></td>
						<td>
							<div class="actions">
								<?php echo anchor('authorization/editmember/'.$member['id'], ' ', 'class="action-edit"');?>
								<?php echo anchor('authorization/deletemember/'.$member['id'], ' ' ,'class="action-delete"');?>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif;?>
		</table>
	</div>
</div>