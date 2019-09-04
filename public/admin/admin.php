<?php

    require '../../app/config.php';
    $title = "Funflix Canada - Admin Home";
    $heading = "Admin - Home";

    use \App\Models\Video;


    Video::init($dbh);
    $video = new Video();
    $list = $video->all();

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
      <th>Video ID</th>
      <th>Title</th>
      <th>Video Type</th>
      <th>Language</th>
      <th>Rating</th>
      <th>Action</th> 
    </tr>
    </thead>
    <?php foreach ($list as $video): ?>
      <tr>
      <td><?= $video['video_id'] ?></td>
      <td><?= ucwords(strtolower(($video['title']))) ?></td>
      <td><?= $video['video_type'] ?></td>
      <td><?= ucwords(strtolower($video['language'])) ?></td>
      <td><?= $video['rating'] ?></td>
      <td><a href="edit.php?video_id=<?= $video['video_id'] ?>">Edit</a> | <a href="#">Delete</a></td>
      </tr>
    <?php endforeach ?>

  </table>
 </div>
 
</body>
