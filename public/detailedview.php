<?php

  use \App\Models\Video;
  use \App\Models\Viewlist;
  require '../app/config.php';

    Video::init($dbh);
    Viewlist::init($dbh);
    $id = $_GET['id'];
    $video = new Video();
    $list = $video->one($id);
    $title = "Funflix Canada - " . ucwords(strtolower($list['title']));
    $heading = ucwords(strtolower($list['title']));
    $viewlist = new Viewlist();

    if("POST" == $_SERVER['REQUEST_METHOD'])
    {
    	$newlist_name = $_POST['list_name'];
    	$user_id = $_SESSION['user_id'];
    	$_POST['user_id'] = $user_id;
    	$_POST['video_id'] = $list['video_id'];	
    	$result = $viewlist->save($_POST);

    	if($result > 0)
    	{
    		$_SESSION['flash'] = 'List created successfully';
				
    	}


    	
    }

   	$viewlist_result = $viewlist->fetchListsForUser($_SESSION['user_id']);


    require '../inc/head.inc.php'; 

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,intial-scale=1.0" />
	<meta name="descriptiion" content="" />
	<title></title>
	


	<script>
	$(document).ready(function(){
    $('#viewlist').on('change', function() {

      if ( this.value == 'create_list')
      {
        $("#add_list").show();
      }
      else
      {
        $("#add_list").hide();
      }

    
    });
});
</script>
	<style type="text/css">
		#add_list{
			display: none;
		}

		body{
			background: #141414;
		}
		
		#container{		
		}

		.box{
			color: #fff;
			font-family: Arial,sans-serif;
			background-color: rgba(40, 40,40, 0.3);
			padding: 20px;
		}

	</style>
</head>
<body>
	   <?php require '../inc/header_load.inc.php'; ?>
	<div id="container">
		<div id="wrapper">
		<div class="box">
		  <h1 style="display: inline;"><?=$heading?></h1>
		  <p style="color:#da2c2b;font-weight:bold;display: inline;padding: 15px">(<?=$list['rating']?> / 10)</p>
		  <p>( <?=$list['video_type']?> )</p>
		   <a href="#">
              <li style="width: 18%; padding:10px">  <img src="images/<?=$list['image'] . '.jpg'?>" alt="<?=$list['title']?>"/></li>
          </a> 
		  <ul>
		  	<li>Language: <?=$list['language']?></li>
		  	<li>Synopsis: <?=$list['synopsis']?></li>
		  	<li>Plot: <?=$list['plot']?></li>
		  	<li>Length: <?=$list['length']?></li>
		  	<li>Director: <?=$list['director']?></li>
		  	<li>Number of Seasons: <?=$list['num_of_season']?></li>
		  </ul>
		  <p>
		  	<select id="viewlist">
		  		<option value="create_list">Create a new list</option>
		  		<?php if (!empty($viewlist_result)): ?>
		  		<?php foreach ($viewlist_result as $viewlist): ?>
		  			<option value="<?=$viewlist['list_id']?>" selected="selected">
		  				<?=$viewlist['list_name']?>
		  			</option>
		  		<?php endforeach ?>	
		  		<?php endif ?>
		  	</select>
		  		<label>Add to a list</label>
		  	<div id="add_list">
		  		<form method="post">

		  	<input type="text" name="list_name">
		  	<input type="submit" name="button">
		  		</form>
		  	</div>



		  
		</div>

		</div>	



</body>
</html>