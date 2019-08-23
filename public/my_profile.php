<?php

/**
 * My Profile Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
    require '../app/config.php';
    $title = "Funflix Canada - My Profile";
    $heading = "My Profile";

    if(empty($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
      $_SESSION['flash'] = 'You must be logged in to view a profile';
      header("Location: login.php");
      die;
    }else{

    // the last inserted user id from the url
  $query = 'SELECT *
              FROM
              users
              WHERE user_id = :user_id';

    // Preparing the query
  $stmt = $dbh->prepare($query);

  // Passing the required parameters 
  $params = array(
      ':user_id' => $_SESSION['user_id']
  );

  // Executing the query with params
  $stmt->execute($params);

  // Fetch it as an associative array
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // Title of the page
  $title = 'User Information';

  // h2 message
}
?>

<?php require '../inc/head.inc.php';?>

<body style="background: none;">
  <?php require '../inc/header_load.inc.php'; ?>
  <div id="user">
  <h1><?=$result['first_name'] . " " . $result['last_name']?></h1>
  <ul>
    <?php foreach($result as $key => $value) : ?>
    <?php if($key != 'password' && $key != 'user_id' && $key != 'updated_at') : ?>
      <li><?="<strong>$key</strong> : $value"?></li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
  </div> 
  <?php require '../inc/footer.inc.php'; ?>
</body>
</html>