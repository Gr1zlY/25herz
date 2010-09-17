<script type="text/javascript" language="javascript" charset="utf-8">
	$(function() {
		var comment_form = $("form").html();
		var appsel, id;

		$(".reply").click(function(){

			$('.commentForm').html('');
			var current  = $(this).parent().parent().parent();

			//$(appsel).children(".commentForm").remove();
			//comment_form = $("form").html();
			appsel = current;
			id = appsel.attr('class').replace('/[^0-9]/g', '');
			alert(id);
			/*id = appsel.attr('class').replace("comment","").replace("child_comment","");
			$(appsel).append('<form method="post" action = "" class="commentForm">'+comment_form+'<input type="hidden" value="'+id+'" name="parent_id"></form>');
			$(appsel).children("input[name=parent_id]").val(id);*/
			return false;
		});
	});
</script>
<ul class="commentsList">

	<?php if(isset($comments) AND $comments != FALSE):?>
	
		<?php foreach($comments as $comment):?>
			<li class="comment <?php echo ($comment['parent_id'])?'child_comment ':' '; echo $comment['id']; ?>">
				<div class="meta">
					<span class="date"><?php echo $comment['name']; ?> at <?php echo mdate('%d.%m.%y @ %h:%i %a', $comment['time']); ?></span>
					<span><?php echo anchor('#', 'reply', 'class = "reply"');?></span>
				</div>
				<div class="commentContent">
					<p><?php echo $comment['comment'];?></p>
				</div>
			</li>
		<?php endforeach;?>
		
	<?php endif;?>
	
</ul>
