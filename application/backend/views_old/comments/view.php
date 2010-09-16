<div id="comments">	
	
	<?php if(isset($comments) AND $comments != FALSE):?>

		<?php echo form_open(current_url()); ?>
		<?php echo form_submit('submit', 'Удалить', 'class = "submit"'); ?>
		
		<ul>
			<?php foreach($comments as $comment):?>
				<li class="comment">
					<div class="meta">
						<span><?php echo form_checkbox('ids[]',  $comment['id'], FALSE); ?></span>
						<span class="date"><?php echo $comment['name']; ?> at <?php echo mdate('%d.%m.%y @ %h:%i %a', $comment['time']); ?></span>
					</div>
					<div class="commentContent">
						<p><?php echo $comment['comment'];?></p>
					</div>
				</li>
			<?php endforeach;?>
		</ul>
		
		<?php echo form_submit('submit', 'Удалить', 'class = "submit"'); ?>
		<?php echo form_close(); ?>
		
	<?php endif;?>
	
</div>
