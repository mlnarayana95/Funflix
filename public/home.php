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
    $list = $genrevideo->fetchAllComedies();

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
    <?php if ( isset($search)) : ?>
      <div style="margin-top: 100px;">
        
      </div>
         <div class="autoplay">  
          <?php foreach ($search as $video): ?>
            <div>
                <a style="color:#fff;" href="detailedview.php?id=
                <?=esc_attr($video['video_id'])?>">
                <img src="images/<?=esc_attr($video['image']) . '.jpg'?>" 
                alt="<?=esc_attr($video['title'])?>"/>
                <p><?=$video['title']?></p>
                </a> 
            </div>

          <?php endforeach ?>
    </div>
    <?php else: ?>    
    <div>
      <img id="daredevil" src="images/daredevil1000px.jpg" alt="main_banner"/>
    </div>
    <div id="wrapper">

      <?php if (isset($genrename)): ?>
        
      <h2><?=esc($genrename)?></h2>
      <?php else: ?>
        <h2>Comedies</h2>
      <?php endif ?>
      <div class="autoplay">  
      
          <?php foreach ($list as $video): ?>
            <div>
                <a style="color:#fff;" href="detailedview.php?id=
                <?=esc_attr($video['video_id'])?>">
                <img src="images/<?=esc_attr($video['image']) . '.jpg'?>" 
                alt="<?=esc_attr($video['title'])?>"/>
                <p><?=esc($video['title'])?></p>
                </a> 
            </div>

          <?php endforeach ?>
         
   
    </div>
      <h2>Top Rated Shows On Funflix</h2>
      <div class="autoplay">  
       
          <?php foreach ($top_rated_tv_shows as $video): ?>

            <div>
     
              <a style="color:#fff;" href="detailedview.php?id=<?=esc_attr($video['video_id'])?>"> <img src="images/<?=esc_attr($video['image']) . '.jpg'?>" alt="<?=esc_attr($video['title'])?>"/> 
              <p><?=esc($video['title'])?></p>
              </a> 
          </div>
          <?php endforeach ?>
         
   
    </div>
    <h2>Recently Added</h2>
    <div class="autoplay">
       <?php foreach ($top_rated_tv_shows as $video): ?>
            <div>
              <a style="color:#fff;" href="detailedview.php?id=<?=esc_attr($video['video_id'])?>">  <img src="images/<?=esc_attr($video['image']) . '.jpg'?>" alt="<?=esc_attr($video['title'])?>"/>  
              <p><?=esc($video['title'])?></p>
              </a>
            </div>
          <?php endforeach ?>
    </div>
  </div>
  <?php endif ?>
    
   <?php require '../inc/footer.inc.php'; ?>
  </div>
</body>
</html>