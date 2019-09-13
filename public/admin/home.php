<?php

    require '../../app/config.php';
    $title = "Funflix Canada - Admin Home";
    $heading = "Admin - Home";

    use \App\Models\Model;
    use \App\Models\Users;
    use \App\Models\Genre;
    use \App\Models\Video;
    use \App\Models\Viewlist;

    Model::init($dbh);

    $user = new Users();
    $genre = new Genre();
    $video = new Video();

    $users_count = $user->returnCount();
    $genre_count = $genre->returnCount();
    $tvshows_count = $video->returnCount('TVSHOW');
    $movies_count = $video->returnCount('MOVIES');
    $video_count = $tvshows_count + $movies_count;

    $aggregate_tvshows = $video->returnAggregate('TVSHOW');
    $aggregate_movies = $video->returnAggregate('MOVIES');
    $logger_data = $logger->all();

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
  <table class="table table-bordered">
    <tr>
      <th style="         padding: 1.75rem;
    font-size: 18px;
    vertical-align: top;">Overview</th>
      <th style="         padding: 1.75rem;
    font-size: 18px;
    vertical-align: top;">TV Show Stats</th>
      <th style="         padding: 1.75rem;
    font-size: 18px;
    vertical-align: top;">Movies Stats</th>
    </tr>
    <tr>
      <td>
        <ul>
          <li><strong>Total Number of Users :</strong> <?=$users_count['COUNT']?></li>
          <li><strong>Total Number of TV Shows :</strong> <?=$tvshows_count['COUNT(*)'] ?></li>
          <li><strong>Total Number of Movies :</strong> <?=$movies_count['COUNT(*)'] ?></li>
          <li><strong>Total Number of Genres :</strong> <?=$genre_count['COUNT'] ?></li>
        </ul>
      </td>
      <td>
        <ul>
          <li><strong>Longest Aired TV Show Episode :</strong> 
            <?=esc($aggregate_tvshows['max(length)'])?> minutes
          </li>
          <li><strong>Shortest Aired TV Show Episode :</strong> 
            <?=esc($aggregate_movies['min(length)'])?> minutes
          </li>
          <li><strong>Average Length of an episode :</strong> 
            <?=esc(round($aggregate_tvshows['avg(length)'],2))?> minutes
          </li>
        </ul>
      </td>
      <td>
        <ul>
         <li><strong>Longest Movie :</strong> 
            <?=esc($aggregate_movies['max(length)'])?> minutes
          </li>
          <li><strong>Shortest Movie :</strong> 
            <?=esc($aggregate_movies['min(length)'])?> minutes
          </li>
          <li><strong>Average Length of Movie :</strong> 
            <?=esc(round($aggregate_movies['avg(length)']))?> minutes
          </li>
        </ul>
      </td>
    </tr>

  </table>
    <div>
    <table class=" table table-bordered">
      <tr>
        <th>Log ID</th>
        <th>Log</th>
      </tr>
      <tr>
      
      <?php foreach ($logger_data as $log): ?>
      <tr>
        <td>
          <?= $log['id'] ?>
        </td>
        <td>
          <?= $log['event'] ?>
        </td>  
      </tr>
      <?php endforeach ?>
        
      </tr>
    </table>
  </div>
  </div>

 
</body>
