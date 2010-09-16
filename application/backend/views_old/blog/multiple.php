<div id="viewposts">
	<?php if($posts != FALSE): ?>
		<?php foreach($posts as $preview): ?>
			<div class="post">
					<h2><?php echo anchor('admin/editpost/'.$preview['id'], $preview['title']);?></h2>
					<div class="meta">
					<span><?php echo $preview['author']; ?> at <?php echo mdate('%d.%m.%y @ %h:%i %a', $preview['time']); ?></span>
					<span class="edit"><?php echo anchor('admin/editpost/'.$preview['id'], 'edit');?></span>
					<span class="delete"><?php echo anchor('admin/delete/'.$preview['id'], 'delete');?></span>
				</div>
				<div class="postContent">
					<?php echo $preview['preview']; ?>
				</div>				
			</div>
		<?php endforeach; ?>
	<?php endif;?>
</div>
