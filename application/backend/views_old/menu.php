<div id="form">
	<ul>
		<li><a href="">На сайт</a></li>
		<li><?php echo anchor('', 'В админпанель');?></li>
		<li><?php echo anchor('admin/posts', 'Посмотреть все страницы');?></li>
		<li><?php echo anchor('admin/newpost', 'Создать пост');?></li>
		<li><?php echo anchor('admin/viewcomments', 'Управление комментариями');?></li>
		<li><?php echo anchor('authorization/members', 'Управление пользователями');?></li>
		<li><?php echo anchor('authorization/createaccount', 'Создание аккаунта');?></li>
	</ul>
</div>
