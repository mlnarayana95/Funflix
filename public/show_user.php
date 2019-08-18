<?php

	/**
	 * Show User Page 
	 * last_update: 2019-08-09
	 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
	 */
	// Adding the configuration file to set a database connection and fetch data
	require '../app/config.php';

	$user_id = $_GET['user_id'];	

	if(empty($user_id)){
		die('Go back to the <a href="sign_up.php">sign up</a> page');
	}

	// query to fetch the last inserted record by passing 
	// the last inserted user id from the url
	$query = 'SELECT *
              FROM
              users
              WHERE user_id = :user_id';

    // Preparing the query
	$stmt = $dbh->prepare($query);

	// Passing the required parameters 
	$params = array(
    	':user_id' => $_GET['user_id']
	);

	// Executing the query with params
	$stmt->execute($params);

	// Fetch it as an associative array
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	// Title of the page
	$title = 'User Information';

	// h2 message
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