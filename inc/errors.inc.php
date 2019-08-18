<?php if(!empty($v->getErrors())) : ?>
		<div class="errors">
			<ul>
				<?php foreach($v->getErrors() as $list) : ?>
				  <li><?=$list?></li>
				<?php endforeach; ?>
			</ul>
		</div>
<?php endif; ?>