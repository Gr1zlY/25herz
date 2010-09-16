<div id = "form">
	<?php if(isset($members) AND $members != FALSE):?>

		<?php echo form_open(current_url()); ?>
		<?php echo form_submit('submit', 'Удалить', 'class = "submit"'); ?>

		<table>
		<?php foreach($members as $member): ?>
			<tr>
				<td><?php echo form_checkbox('ids[]',  $member['id'], FALSE); ?></td>
				<td><?php echo $member['name']; ?></td>
				<td><?php echo $member['login']; ?></td>
				<td><?php echo $member['email']; ?></td>
				<td><?php echo $member['permissions']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
		
		<?php echo form_submit('submit', 'Удалить', 'class = "submit"'); ?>
		<?php echo form_close(); ?>
		
	<?php endif;?>
</div>
