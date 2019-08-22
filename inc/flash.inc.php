<?php if(!empty($_SESSION['flash'])) : ?>
<div class="flash">
	<p><?=$_SESSION['flash']?></p>
</div>
<?php 
unset($_SESSION['flash']);
endif; 
?>