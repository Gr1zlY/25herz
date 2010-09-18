<script type="text/javascript" language="javascript" charset="utf-8">
	$(function() {
		var comment_form = $("form").html();
		var id;
		$(".reply").click(function(){
			var current  = $(this).parent().parent().parent();
			current.append($('.commentForm'));
			id = $(current).attr('id').replace("comment","");
			alert(id);
			$('#parent-id').val(id);
			return false;
		});
	});
</script>

<ul class="commentsList">

	<?php if(isset($comments) AND $comments != FALSE):?>
	
		<?php foreach($comments as $comment):?>
			<li id="comment<?php echo ($comment['parent_id'])?'child_comment ':' '; echo $comment['id']; ?>">
				<div class="meta">
					<span class="date"><?php echo $comment['name']; ?> at <?php echo mdate('%d.%m.%y @ %h:%i %a', $comment['time']); ?></span>
					<span><?php echo anchor('', 'reply', 'class = "reply"');?></span>
				</div>
				<div class="commentContent">
					<p><?php echo $comment['comment'];?></p>
				</div>
			</li>
		<?php endforeach;?>
		
	<?php endif;?>
	
</ul>
