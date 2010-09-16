<div id="content">
	<div class="post">
		<h2><?php echo $title; ?></h2>
		<div class="meta">
			<span><?php echo $author; ?> at <?php echo mdate('%d.%m.%y @ %h:%i %a', $time); ?></span>
		</div>
		<div class="postContent">
			<?php echo $preview; ?>
			<?php echo $post; ?>
		</div>				
	</div>
	<?php $this->load->view('comments/comments'); ?>
</div>
