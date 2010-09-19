<script type="text/javascript" language="javascript" charset="utf-8">
	$(function() {
		var comment_form = $("form").html();
		var id;
		$(".reply").click(function(){
			var current  = $(this).parent().parent().parent();
			current.append($('.commentForm'));
			id = $(current).attr('id').replace("comment","");
			$('#parent-id').val(id);
			return false;
		});
	});
</script>
<?php if(isset($comments) AND $comments != FALSE):?>
	
<?php
	//начинается быдлокод	
	function ok_comment_get_children($comments, $parent_id)
	{
		$children = array();
		//проходимся по всем комментариям
		$count = count($comments);
		for($i=0; $i<$count; $i++)
		{
			if($comments[$i]['parent_id'] == $parent_id)
				$children[] = $comments[$i];
		}
		return $children;
	}
	
	function ok_comment_draw_recursively($comments, $root)
	{	
		$children = ok_comment_get_children($comments, $root);
		
		$count = count($children);
		if($count==0) return; ?>
		
		<ul class="commentsList">
		<?php	
			for($i=0; $i<$count; $i++)
			{
				$comment = $children[$i]; ?> 
			
				<li id="comment<?php echo $comment['id'];?>">
					<div class="meta">
						<span class="date"><?php echo $comment['name']; ?> at <?php echo mdate('%d.%m.%y @ %h:%i %a', $comment['time']); ?></span>
						<span><?php echo anchor('', 'reply', 'class = "reply"');?></span>
					</div>
					<div class="commentContent">
						<p><?php echo $comment['comment'];?></p>
					</div>
				<?php ok_comment_draw_recursively($comments, $comment['id']); ?>
				</li>
		<?php } ?>
		</ul>
<?php }	?>
	
<?php ok_comment_draw_recursively($comments, 0); ?>
<?php endif;?>