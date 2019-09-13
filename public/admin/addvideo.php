<?php


/**
 * Admin Add Video Page
 * @last_update: 2019-09-13
 * @author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

    require '../../app/config.php';
    $title = "Funflix Canada - Admin Home";
    $heading = "Admin - Add new Record";

    use \App\Models\Video;
    use \App\Models\Genre;
    use \App\Models\Genre_Video;
    use \App\Validator;

  if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true)
    {
    Video::init($dbh);
    $video = new Video();

    Genre::init($dbh);
    $genre = new Genre();
    $genre_list = $genre->all();

    Genre_Video::init($dbh);
    $genre_video = new Genre_Video();
    $genre_video_list = $genre_video->all();  

    if("POST" == $_SERVER['REQUEST_METHOD'])
    {

      $numeric_fields = ['num_of_season','rating','length'];
      $string_fields = [ 'synopsis','plot','director'];
      $length_fields = ['title', 'synopsis','plot','image','director'];
      $release_date = trim($_POST['release_date']);
      
      $v = new Validator();

      foreach ($numeric_fields as $field) {
        $v->isNumeric($field);
      }

      foreach($_POST as $key => $value) {
        $v->required($key);  
      }

      foreach ($string_fields as $key) {
        $v->stringValidator($key);
      }

      foreach ($length_fields as $key) {
        $v->lengthValidator($key);
      }

      $v->validateDate($release_date);

      $errors = $v->getErrors();

      if(empty($errors))
      {
        $result = $video->save($_POST);

          $_SESSION['flash'] = 
          'Video has been successfully added';
          header("Location:vidcollection.php");
          die;
      }
    }
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
  <script>
  
  $(document).ready(function(){

    $('#video_type').on('change', function() {

        if ( this.value == 'TVSHOW')
        {
        $("#seasons").show();
        }
        else
        {
        $("#seasons").hide();
        }
    });

  });

  </script> 
  <?php require '../../inc/edit.inc.css'; ?>
  <title><?=$title?></title>
<body>   
  <?php require '../../inc/admin_header.inc.php'; ?>
  <?php require '../../inc/flash.inc.php'; ?>
  <?php require '../../inc/errors.inc.php'; ?>   
  
 
 <div id="container">
  <h2><?=$heading?></h2>
  <div id="wrapper">
    <form action="addvideo.php" method="POST">
    <input type="hidden" name="csrf" value="<?=csrf()?>" />
    
    <div class="form-group">
      <label for="title">TITLE</label>
      <input type="text" class="form-control" id="title" name="title" 
      value="<?=clean('title')?>" >
    </div>

    <div class="form-group">
      <label for="video_type">VIDEO TYPE</label>
      <select class="form-control" id="video_type"  name="video_type">
        <option value="MOVIES">MOVIES</option> 
        <option value="TVSHOW" selected="selected">TVSHOW</option> 
      </select>
    </div>

    <div class="form-group">
      <label for="genre">GENRE</label>
      <select class="form-control" id="genre"  name="genre">
        <?php foreach ($genre_list as $genre): ?>
          <option value="<?= $genre['genre_id'] ?>" ><?= $genre['genre_name'] ?></option>
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
          <option value="<?php echo strtolower($item); ?>" >
            <?php echo $item; ?>
          </option>
 <?php
        }
        ?>

      </select>
    </div>

    <div class="form-group">
      <label for="rating">RATING</label>
      <input type="text" class="form-control" id="rating" name="rating" 
      value="<?=clean('rating')?>" >
    </div>

    <div class="form-group">
      <label for="synopsis">SYNOPSIS</label>
      <textarea class="form-control" id="synopsis" name="synopsis" 
      rows="3"><?=clean('synopsis')?>
      </textarea>
    </div>

    <div class="form-group">
      <label for="plot">DESCRIPTION</label>
      <textarea class="form-control" id="plot" name="plot" 
       rows="3"> <?=clean('plot')?> </textarea>
    </div>

    <div id="seasons" class="form-group">
      <label for="num_of_season">NUMBER OF SEASONS</label>
      <input type="text" class="form-control" id="num_of_season" name="num_of_season" 
      value="<?=clean('num_of_season')?>" />
    </div>
   
    <div class="form-group">
      <label for="release_date">RELEASE DATE</label>
      <input type="text" class="form-control" id="release_date" 
      name="release_date" value="<?=clean('release_date')?>" >
    </div>

    <div class="form-group">
      <label for="image">IMAGE (NAME OF FILE)</label>
      <input type="text" class="form-control" id="image" name="image" 
      value="<?=clean('image')?>" >
    </div>

    <div class="form-group">
      <label for="length">LENGTH IN MINUTES</label>
      <input type="text" class="form-control" id="length" 
      name="length" value="<?=clean('length')?>" >
    </div>

    <div class="form-group">
      <label for="director">DIRECTOR</label>
      <input type="text" class="form-control" id="director" name="director" 
      value="<?=clean('director')?>"  />
    </div>

    <div class="form-group">
      <button style=" background:#e50914" type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>

    </div>

  </form>

  </div>

 </div>
 
</body>
