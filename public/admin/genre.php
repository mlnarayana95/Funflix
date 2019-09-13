<?php


/**
 * Genre Page
 * @last_update: 2019-09-13
 * @author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

    require '../../app/config.php';
    $title = "Funflix Canada - Admin Genre";
    $heading = "Admin - Genre";
    use \App\Models\Genre;


    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {

        Genre::init($dbh);
        $genre = new Genre();
        $list = $genre->all();
    }else{
      header("Location: ../login.php");
      $_SESSION['flash'] = 'You need to be admin to view this page';
      die;
  }



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
      <th>Genre ID</th>
      <th>Genre Name</th>
    </tr>
    </thead>
    <?php foreach ($list as $genre): ?>
      <tr>
      <td><?= $genre['genre_id'] ?></td>
      <td><?= ucwords(strtolower(($genre['genre_name']))) ?></td>     
      </tr>    <?php endforeach ?>

  </table>
 </div>
 
</body>
