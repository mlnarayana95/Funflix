<?php

/**
 * Movies Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
     require '../app/config.php';
     $title = "Funflix Canada - Movies";
     $heading = "Movies";
     require '../inc/head.inc.php'; 

    use \App\Models\Video;

    Video::init($dbh);
    $video = new Video();
    $list = $video->fetchAllMovies();
?>
<body>
  <div id="container">
    <?php require '../inc/header_load.inc.php'; ?>
      <div id="wrapper">
        <h1><?=$heading?></h1>
        <main>
        <div class="autoplay">  
      
          <?php foreach ($list as $video): ?>
            <div>
          <a href="detailedview.php?id=<?=$video['video_id']?>">
              <li style="width: 18%; padding:10px">  <img src="images/<?=$video['image'] . '.jpg'?>" alt="<?=$video['title']?>"/></li>
          </a> 
          </div>
          <?php endforeach ?>
         
   
    </div>
        </main>
      </div>
    <?php require '../inc/footer.inc.php'; ?>
 
  </div>
</body>
</html>