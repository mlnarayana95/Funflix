<?php if(!empty($errors)) : ?>
		<div class="errors">
			<ul>
				<?php foreach($errors as $list) : ?>
				  <li><?=$list?></li>
				<?php endforeach; ?>
			</ul>
		</div>
<?php endif; ?>