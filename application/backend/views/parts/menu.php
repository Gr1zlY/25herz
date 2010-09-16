<?php if($this->session->userdata('logged_in') == TRUE): ?>
	<ul id="menu">
		<li><a href="">На сайт</a></li>
		<li><?php echo anchor('', 'В админпанель');?></li>
		<li><?php echo anchor('admin/posts', 'Посмотреть все страницы');?></li>
		<li><?php echo anchor('admin/newpost', 'Создать пост');?></li>
		<li><?php echo anchor('admin/viewcomments', 'Комментарии');?></li>
		<li><?php echo anchor('authorization/members', 'Пользователи');?></li>
		<li><?php echo anchor('authorization/createaccount', 'Создание аккаунта');?></li>
		<li><?php echo anchor('authorization/logout', 'Выход');?></li>
	</ul>
<?php endif; ?>
