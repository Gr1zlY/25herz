<ul id="mainMenu">
	<?php foreach($this->blog_model->sGetCategories() as $item): ?>
		<li>
			<?php echo anchor($item['clink'], $item['ctitle']); ?>
		</li>
	<?php endforeach; ?>
	<li>
		<a href="">О нас (test)</a>
	</li>
</ul>
