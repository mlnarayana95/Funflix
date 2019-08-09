<?php

require '../app/config.php';

$user_id = $_GET['user_id'];

$query = 'SELECT *
            FROM
            users
            WHERE user_id = :user_id';

$stmt = $dbh->prepare($query);

$params = array(
    ':user_id' => $_GET['user_id']
);

$stmt->execute($params);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

$title = 'User Information';

$message = 'Thank you for joining us.'
?>
<?php require '../inc/head.inc.php';?>

<body style="background: none;">
  <?php require '../inc/header.inc.php';?>
  <div id="user">
	<h1><?=$result['first_name'] . " " . $result['last_name']?></h1>
	<h2 style="font-size:30px"><?=$message ?></h2>
	<ul>
	  <?php foreach($result as $key => $value) : ?>
		<?php if($key != 'password' && $key != 'user_id' && $key != 'updated_at') : ?>
		  <li><?="<strong>$key</strong> : $value"?></li>
	    <?php endif; ?>
	  <?php endforeach; ?>
	</ul>
	<a href="signup.php">Add a new user</a>
	</div>
   <?php require '../inc/footer.inc.php'; ?>
</body>
</html>