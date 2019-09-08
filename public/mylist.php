<?php

	use \App\Models\Viewlist;
	use \App\Models\Viewlistvideo;
  	
  	require '../app/config.php';

    $title="Funflix Canada - List";

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
<body>

   <?php require '../inc/navheader.inc.php'; ?>
    <main>
    	<div id="container">
    		<h2><?=$title?></h2>
    	</div>

    	 <div id="wrapper">
     	 
          <?php foreach($result as $list): ?>
            <h2><?=$list[0]['list_name']?></h2>
            <div class="autoplay left-align-slick">
            	<?php for($v=0; $v < count($list); $v++) : ?>
            		<span>
            		<a href="detailedview.php?id=<?=$list[$v]['video_id']?>">
		              <li style="width: 18%; padding:10px; display:inline-block;">  <img src="images/<?=$list[$v]['image'] . '.jpg'?>" alt="<?=$list[$v]['title']?>"/></li>
		          	</a> 
		          	</span>
            	<?php endfor; ?>
          	
          </div>
          <?php endforeach ?>
         
   
    </div>



    
    </main>

   <?php require '../inc/footer.inc.php'; ?>
  </div>
</body>
</html>