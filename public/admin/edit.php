<?php

    require '../../app/config.php';
    $title = "Funflix Canada - Admin Home";
    $heading = "Admin - Edit";

    use \App\Models\Video;
    if(!empty($_GET['video_id']))
    {
      Video::init($dbh);
      $id = $_GET['video_id'];
      $video = new Video();
      $vid = $video->one($id);
      var_dump($vid);
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
  <?php require '../../inc/edit.inc.css'; ?>
  <title><?=$title?></title>
<body>   
  <?php require '../../inc/admin_header.inc.php'; ?>
  <?php require '../../inc/flash.inc.php'; ?>
  <div id="container">
  <h2><?=$heading?></h2>

  <form>
    <div class="form-group">
      <label for="video_id">Video ID</label>
      <input type="text" class="form-control" id="video_id" name="video_id" value="<?= $vid['video_id'] ?>" disabled>
    </div>

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="<?= $vid['title'] ?>" >
    </div>

    <div class="form-group">
      <label for="video_type">VIDEO TYPE</label>
      <select class="form-control" id="video_type"  name="video_type">
        <?php if ($vid['video_type'] == 'TVSHOW'): ?>
          <option value="MOVIES">MOVIES</option> 
          <option value="TVSHOW" selected="selected">TVSHOW</option> 
        <?php elseif($vid['video_type'] == 'MOVIES'):  ?>
          <option value="MOVIES" selected="selected">MOVIES</option> 
          <option value="TVSHOW" >TVSHOW</option> 
        <?php endif ?>
      </select>
    </div>

    <div class="form-group">
      <label for="language">LANGUAGE</label>
      <select class="form-control" id="language" name="language">
        <?php 

        $language_list = ['ENGLISH','SPANISH','HINDI','TELUGU','ARABIC'];

        foreach($language_list as $item){
        ?>
        <?php if ($item == $vid['language']): ?>
          <option value="<?php echo strtolower($item); ?>" selected ="selected"><?php echo $item; ?></option>
          <?php else: ?>
          <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>        
        <?php endif ?>
        <?php
        }
        ?>

      </select>
    </div>

    <?php if ($vid['video_type'] == 'TVSHOW'): ?>
     <div class="form-group">
      <label for="number_of_season">Number of Seasons</label>
      <input type="text" class="form-control" id="number_of_season" name="number_of_season" value="<?= $vid['num_of_season']?> " >
    </div> 
    <?php endif ?>
    

    <div class="form-group">
      <label for="synopsis">Synopsis</label>
      <textarea class="form-control" id="synopsis" name="synopsis" rows="3"></textarea>
    </div>
    
    <div>
      
    </div>
  </form>

 </div>
 
</body>
