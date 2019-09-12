<?php

    require '../../app/config.php';
    $title = "Funflix Canada - Admin Users";
    $heading = "Admin - Users";

    use \App\Models\Users;


    Users::init($dbh);
    $user = new Users();
    $list = $user->all();

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/apple-touch-icon.png"/>
  <link rel="icon" sizes="57x57" href="images/android-chrome-57x57.png" />
  <link rel="icon" sizes="72x72" href="images/android-chrome-72x72.png" />
  <link rel="icon" sizes="114x114" href="images/apple-icon-114x114.png" />
  <link rel="icon" sizes="144x144" href="images/apple-icon-144x144.png" />
  <link rel="stylesheet" href="../css/desktop.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <?php require '../../inc/admin.inc.css'; ?>
  <title><?=$title?></title>
</head>

<body>   
  <?php require '../../inc/admin_header.inc.php'; ?>
  <?php require '../../inc/flash.inc.php'; ?>
  <div id="container">
  <h2><?=$heading?></h2>
  <table class="table table-bordered table-hover">
    <thead class="thead-light">
    <tr>
      <th>User ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Street</th>
      <th>Action</th> 
    </tr>
    </thead>
    <?php foreach ($list as $user): ?>
      <tr>
      <td><?= $user['user_id'] ?></td>
      <td><?= ucwords(strtolower(($user['first_name']))) ?></td>
      <td><?= ucwords(strtolower($user['last_name'])) ?></td>
      <td><?= $user['street'] ?></td>
      <td><a href="edit.php?userid=<?= $user['user_id'] ?>">Edit</a> | <a href="#">Delete</a></td>
      </tr>
    <?php endforeach ?>

  </table>
 </div>
 
</body>
