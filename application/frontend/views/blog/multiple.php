<div id="blogContent">
	<?php if($previews != FALSE):?>
		<?php foreach($previews as $preview): ?>
			<div class="post">
					<h2><a href="<?php echo site_url( $preview['category'].'/'.$preview['link'] ); ?>"><?php echo $preview['title']; ?></a></h2>
					<div class="meta">
					<span><?php echo $preview['author']; ?> at <?php echo mdate('%d.%m.%y @ %h:%i %a', $preview['time']); ?></span>
					<span class="comments"><a href="">Comments (<?php echo $preview['comments_qty']; ?>)</a></span>
				</div>
				<div class="postContent">
					<?php echo $preview['preview']; ?>
				</div>				
			</div>
		<?php endforeach; ?>
	<?php endif;?>
</div>
