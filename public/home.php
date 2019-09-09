<?php 

 /**
 * Home Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
    require '../app/config.php';
    $title = "Funflix Canada - Home";
    $heading = "Home";
    require '../inc/head.inc.php'; 


    use \App\Models\Video;
    use \App\Models\Genre_Video;

    Video::init($dbh);
    Genre_Video::init($dbh);
    
    $genrevideo = new Genre_Video();
    $video = new Video();
    $list = $video->all();

    $top_rated_tv_shows = $video->sort('TVSHOW','rating','DESC');
    $most_recent_tv_shows = $video->sort('TVSHOW','release_date','ASC');

    if( isset($_GET['genre_id']) && (!empty($_GET['genre_id'])) )
    {
      $list = $genrevideo->getAllVideoOfAGenre($_GET['genre_id']);
      $genrename = $list[0]['genre_name'];
    }
    

?>
<body>
  <div id="container">
   <?php require '../inc/header_load.inc.php'; ?>
  
    <div>
      <img id="daredevil" src="images/daredevil1000px.jpg" alt="main_banner"/>
    </div>
    <div id="wrapper">

      <?php if (isset($genrename)): ?>
        
      <h2><?=$genrename?></h2>

      <?php endif ?>
      <div class="autoplay">  
      
          <?php foreach ($list as $video): ?>
            <div>
                <a href="detailedview.php?id=<?=$video['video_id']?>">
                <img src="images/<?=$video['image'] . '.jpg'?>" alt="<?=$video['title']?>"/>
                </a> 
            </div>
          <?php endforeach ?>
         
   
    </div>
      <h2>Top Rated Shows On Funflix</h2>
      <div class="autoplay">  
       
          <?php foreach ($top_rated_tv_shows as $video): ?>

            <div>
     
              <a href="detailedview.php?id=<?=$video['video_id']?>"> <img src="images/<?=$video['image'] . '.jpg'?>" alt="<?=$video['title']?>"/> </a> 
         
          </div>
          <?php endforeach ?>
         
   
    </div>
    <h2>Recently Added</h2>
    <div class="autoplay">
       <?php foreach ($top_rated_tv_shows as $video): ?>

            <div>
               <a href="detailedview.php?id=<?=$video['video_id']?>">  <img src="images/<?=$video['image'] . '.jpg'?>" alt="<?=$video['title']?>"/>  </a>
            </div>
          <?php endforeach ?>
    </div>
  </div>
   <?php require '../inc/footer.inc.php'; ?>
  </div>
</body>
</html>