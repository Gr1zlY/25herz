<ul id="mainMenu">
	<?php foreach($this->blog_model->sGetCategories() as $item): ?>
	<li <?php echo (isset($category) AND $category['clink'] == $item['clink'])?'class="selected"':'';?> >
			<?php echo anchor($item['clink'], $item['ctitle']); ?>
		</li>
	<?php endforeach; ?>
	<li>
		<a href="">О нас</a>
	</li>
</ul>
