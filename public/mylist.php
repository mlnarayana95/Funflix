<?php

	use \App\Models\Viewlist;
	use \App\Models\Viewlistvideo;
  	
  	require '../app/config.php';

    $title="Funflix Canada - My List";

    require '../inc/head.inc.php'; 

    Viewlist::init($dbh);
    Viewlistvideo::init($dbh);
    $viewlist = new Viewlist();
    $viewlistvideo = new Viewlistvideo();
    $list_id = $viewlist->fetchListsForUser($_SESSION['user_id']);
    $result = [];
    
    foreach ($list_id as $list) {
	    $id = $list['list_id'];
      array_push($result,$viewlistvideo->fetchVideos($id));    
    }

?>
<body style="margin:0;">

   <?php require '../inc/navheader.inc.php'; ?>
    <main>
    	<div id="container">
    		<h2><?=esc($title)?></h2>
    	</div>

    	<div id="wrapper">
        <?php foreach($result as $list): ?>
          <?php if(count($list) != 0) : ?>
            <h2><?=esc($list[0]['list_name'])?></h2>
            <div>
              <?php for($v=0; $v < count($list); $v++) : ?>
                <span>
                  <a
                    href="detailedview.php?id=<?=esc_attr($list[$v]['video_id'])?>">
                    <img 
                    src="images/<?=esc_attr($list[$v]['image']) . '.jpg'?>" 
                    alt="<?=esc_attr($list[$v]['title'])?>"/>
                  </a> 
                </span>
              <?php endfor; ?>
            </div>  
   
          <?php endif; ?>
        <?php endforeach ?>
      </div>


    <?php if(empty($result)): ?>
        <div style="color: #000" class="flash">
            <p>No lists to be displayed</p>
        </div>
    <?php endif; ?>
    
    </main>
    <div style="margin-bottom:40px;">
    	
    </div>
   <?php require '../inc/footer.inc.php'; ?>
  </div>
</body>
</html>