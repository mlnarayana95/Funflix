<?php 

/**
 * TV Shows Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
    require '../app/config.php';
    $title = "Funflix Canada - TV Shows";
    $heading = "TV Shows";
    require '../inc/head.inc.php'; 

    use \App\Models\Video;

    Video::init($dbh);
    $video = new Video();
    $list = $video->fetchAllTvShows();

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
                <a style="color:#fff;" 
                href="detailedview.php?id=<?=esc_attr($video['video_id'])?>">
                <img src="images/<?=esc_attr($video['image']) . '.jpg'?>" 
                alt="<?=$video['title']?>"/>
                <p><?=esc($video['title'])?></p>
                </a> 
            </div>

          <?php endforeach ?>
    </div>
    <?php else: ?>    
    <div id="wrapper">  
      <h2><?=esc($heading)?></h2>
       <div class="autoplay">  
      
          <?php foreach ($list as $video): ?>
          <div>
            <a href="detailedview.php?id=<?=esc_attr($video['video_id'])?>">
                <img src="images/<?=esc_attr($video['image']) . '.jpg'?>" 
                alt="<?=esc_attr($video['title'])?>"/>
            </a> 
          </div>
          <?php endforeach ?>    
        </div>
      <?php endif; ?>
    <?php require '../inc/footer.inc.php'; ?>
 
  </div>
</div>
</body>
</html>