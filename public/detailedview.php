<?php

  use \App\Models\Video;
  use \App\Models\Viewlist;
  use \App\Models\Viewlistvideo;

  require '../app/config.php';

	Video::init($dbh);
	Viewlist::init($dbh);
	Viewlistvideo::init($dbh);

	if(!empty($_GET['id']))
	{
		$id = $_GET['id'];
		$video = new Video();
		$list = $video->one($id);
		$_SESSION['video_id'] = $list['video_id'];
		$title = "Funflix Canada - " . ucwords(strtolower($list['title']));
		$heading = ucwords(strtolower($list['title']));
		$viewlist = new Viewlist();
		$viewlistvideo = new Viewlistvideo();
	}

	if("POST" == $_SERVER['REQUEST_METHOD'])
	{	

		if(!empty($_POST['list_name'])){
			$newlist_name = $_POST['list_name'];
			$user_id = $_SESSION['user_id'];
			$_POST['user_id'] = $user_id;
			$_POST['video_id'] = $list['video_id'];	
			$result = $viewlist->createNewList($_POST);

			if($result > 0)
			{
				$_SESSION['flash'] = 'List added successfully';
			}
		}
		else{
			$_POST['video_id'] = $_SESSION['video_id'];
			$result = $viewlistvideo->saveVideo($_POST);	
			if($result > 0)
			{
				$_SESSION['flash'] = 'Video added successfully';
			}
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
		$("#button").attr('value', 'Create New List');
	  }
	  else
	  {
		$("#add_list").hide();
		$("#button").attr('value', 'Add to List');

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
			text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.45);
		}


		
		#container{		
		}

		.box{
			color: #fff;
			font-family: Arial,sans-serif;
			background-color: rgba(40, 40,40, 0.3);
			padding: 20px;
			margin-bottom: 45px;
		}

		ul{
			padding: 2px;
		}



		select{
			display: block;
			padding: 2px;
			font-size: 1rem;
			font-weight: 400;
			color: #495057;
			background-color: #fff;
			background-clip: padding-box;
			border: 1px solid #ced4da;
			border-radius: .25rem;
		}

		#list_name{
		    display: block;
			padding: 2px;
			font-size: 1rem;
			font-weight: 400;
			color: #495057;
			background-color: #fff;
			background-clip: padding-box;
			border: 1px solid #ced4da;
			border-radius: .25rem;
		}

		.btn {
    border-radius: 6px;
    background: #c32625;
    color: #fff;
    font-weight: bold;
    border: 1px solid #5f5353;
    width: 116px;
    padding: 5px;
    word-wrap: break-word;
    height: 43px;
    margin-left: 1px;
}

		footer{
			bottom: 0;
			position: fixed;
		}

	</style>
</head>
<body>
	   <?php require '../inc/header_load.inc.php'; ?>
	<div id="container">
		<div id="wrapper">
		<div class="box">
			<div>
		  <h1 style="display: inline;"><?=$heading?></h1>
		  <p style="color:#da2c2b;font-weight:bold;display: inline;padding: 15px">(<strong><?=$list['rating']?> / 10)</strong></p>
		  <p>( <?=$list['video_type']?> )</p>
		   <a href="#">
			  <li>  <img src="images/<?=$list['image'] . '.jpg'?>" alt="<?=$list['title']?>"/></li>
		  </a> 
		  <ul>
			<li>Language: <?=label($list['language'])?></li>
			<li>Synopsis: <?=$list['synopsis']?></li>
			<li>Plot: <?=$list['plot']?></li>
			<li>Length: <?=$list['length']?> mins</li>
			<li>Director: <?=$list['director']?></li>
			<li>Number of Seasons: <?=$list['num_of_season']?></li>
		  </ul>
		  	<form method="post">
		  <p>

			<select id="viewlist" name="viewlist">
				<option value="create_list">Create a new list</option>
				<?php if (!empty($viewlist_result)): ?>
				<?php foreach ($viewlist_result as $viewlist): ?>
					<option value="<?=$viewlist['list_id']?>" selected="selected">
						<?=$viewlist['list_name']?>
					</option>
				<?php endforeach ?>	
				<?php endif ?>
			</select>

			<div id="add_list">
			<input type="text" id="list_name" name="list_name">
			</div>
			<input class="btn" style="margin-top:10px " type="submit" name="button" id="button" value="Add to List">
				</form>
			</div>



		  
		

		</div>	

	</div>

	</div>
	<div style="bottom:100px;position:fixed;padding: 10px">
		
	</div>
	
	<?php require '../inc/footer.inc.php'; ?>

</body>
</html>