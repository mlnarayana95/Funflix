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


?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,intial-scale=1.0" />
	<meta name="descriptiion" content="" />
	<title>User Information</title>
	<style type="text/css">

	</style>
</head>
<body>
<h1><?=$result['first_name'] . " " . $result['last_name']?></h1>
<ul>
	<?php foreach($result as $key => $value) : ?>
		<?php if($key != 'password' && $key != 'user_id' && $key != 'updated_at') : ?>
		<li><?="<strong>$key</strong> : $value"?></li>
		<?php endif; ?>
	<?php endforeach; ?>
</ul>

<a href="signup.php">Add a new user</a>
</body>
</html>