<?php


/**
 * Video Collection Page
 * @last_update: 2019-09-13
 * @author: Narayana Madabhushi, mlnarayana95@gmail.com
 */


    require '../../app/config.php';
    $title = "Funflix Canada - Admin Video Collection";
    $heading = "Admin - Video Collection";

    use \App\Models\Video;
    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true)
    {
      Video::init($dbh);
      $video = new Video();

      if(isset($_GET['delete']) && !empty($_GET['delete']))
      {
        $video_id = $_GET['delete'];
        $video_info = $video->one($video_id);
        $result = $video->delete($video_info);
   
        if($result > 0)
        {
          $_SESSION['flash'] = 'Video with ID: '. $video_id. ' deleted successfully';
          header("Location:vidcollection.php");
          die;
        }
      }

      $list = $video->all();
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
  <a href="addvideo.php" class="btn1" 
    style="height: 30px;
           padding: 4px;
           margin-left: 0;
           margin-bottom: 2px;
           line-height: 45px;
           border-radius: 3px;"> Add a new record</a>
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
      <td><a href="edit.php?video_id=<?= $video['video_id'] ?>">Edit</a> | <a href="vidcollection.php?delete=<?=$video['video_id']?>">Delete</a></td>
      </tr>
    <?php endforeach ?>

  </table>
 </div>
 
</body>
