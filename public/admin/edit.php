<?php

    require '../../app/config.php';
    $title = "Funflix Canada - Admin Home";
    $heading = "Admin - Edit";

    use \App\Models\Video;
    use \App\Models\Genre;
    use \App\Models\Genre_Video;
    Video::init($dbh);
    $video = new Video();

    Genre::init($dbh);
    $genre = new Genre();
    $genre_list = $genre->all();

    Genre_Video::init($dbh);
    $genre_video = new Genre_Video();
    $genre_video_list = $genre_video->all();  

    if(!empty($_GET['video_id']))
    {
      $id = $_GET['video_id'];
      $vid = $video->one($id);  
      $vid['associated_genre_id'] = $genre_video->one($id);
      $target_genre_id = ($vid['associated_genre_id']['genre_id']);
      foreach ($genre_list as $genre) {
        if($genre['genre_id'] == $target_genre_id)
        {
          $vid['genre'] = $genre['genre_name'];
        }
      }
    }else{
      $vid = $_POST;
      $video->update($vid);
      $_SESSION['flash'] = 'Record with Video ID: '. $vid['video_id']. ' has been successfully updated';
      header("Location:admin.php");
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
  <?php require '../../inc/edit.inc.css'; ?>
  <title><?=$title?></title>
<body>   
  <?php require '../../inc/admin_header.inc.php'; ?>
  <?php require '../../inc/flash.inc.php'; ?>
  <?php require '../../inc/errors.inc.php'; ?>   
  
 
 <div id="container">
  <h2><?=$heading?></h2>
  <div id="wrapper">
    <form action="edit.php" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" id="video_id" name="video_id" value="<?= $vid['video_id'] ?>" hidden>
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
          <option value="TVSHOW" selected="selected">TV SHOW</option> 
        <?php elseif($vid['video_type'] == 'MOVIES'):  ?>
          <option value="MOVIES" selected="selected">MOVIES</option> 
          <option value="TVSHOW" >TVSHOW</option> 
        <?php endif ?>
      </select>
    </div>

    <div class="form-group">
      <label for="genre">GENRE</label>
      <select class="form-control" id="genre"  name="genre">
        <?php foreach ($genre_list as $genre): ?>
          <?php if ($vid['genre'] == $genre['genre_name']): ?>
             <option value="<?= $genre['genre_id'] ?>" selected="selected"><?= $genre['genre_name'] ?></option>
             <?php else: ?>
               <option value="<?= $genre['genre_id'] ?>"><?= $genre['genre_name'] ?></option>
          <?php endif ?>
        <?php endforeach ?>
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

    <div class="form-group">
      <label for="rating">RATING</label>
      <input type="text" class="form-control" id="rating" name="rating" value="<?= $vid['rating'] ?>" >
    </div>

    <div class="form-group">
      <label for="synopsis">SYNOPSIS</label>
      <textarea class="form-control" id="synopsis" name="synopsis" rows="3"><?= $vid['synopsis']?></textarea>
    </div>

    <?php if ($vid['video_type'] == 'TVSHOW'): ?>
    <div class="form-group">
      <label for="num_of_season">NUMBER OF SEASONS</label>
      <input type="text" class="form-control" id="num_of_season" name="num_of_season" value="<?= $vid['num_of_season'] ?>" >
    </div>
    <?php endif ?>
    
    <div class="form-group">
      <label for="release_date">RELEASE DATE</label>
      <input type="text" class="form-control" id="release_date" name="release_date" value="<?= $vid['release_date'] ?>">
    </div>

    <div class="form-group">
      <button style=" background:#e50914" type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>

    </div>

  </form>

  </div>

 </div>
 
</body>
