<?php

  use \App\Models\Video;
  use \App\Models\Viewlist;
  use \App\Models\Viewlistvideo;
  use \App\Models\Genre_Video;

  require '../app/config.php';

	Video::init($dbh);
	Viewlist::init($dbh);
	Viewlistvideo::init($dbh);
	Genre_Video::init($dbh);
	$genrevideo = new Genre_Video();
	$viewlist = new Viewlist();
	$viewlistvideo = new Viewlistvideo();
	
	if(  isset($_GET['id']) && (!empty($_GET['id']))  )
	{
		$id = $_GET['id'];
		$video = new Video();
		$list = $video->one($id);
		$genreList =  $genrevideo->getGenreOfVideo($id);
		$_SESSION['video_id'] = $list['video_id'];
		$title = "Funflix Canada - Detailed View";
		$heading = ucwords(strtolower($list['title']));
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

?>
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
			  			<img src="images/<?=$list['image'] . '.jpg'?>" alt="<?=$list['title']?>"/>
		  			</a> 
		  	<ul>
		  		<li><a href="home.php?genre_id=<?=$genreList[0]['genre_id']?>">Genre: <?=$genreList[0]['genre_name']?></a></li>
			<li>Language: <?=label($list['language'])?></li>
			<li>Synopsis: <?=$list['synopsis']?></li>
			<li>Plot: <?=$list['plot']?></li>
			<li>Length: <?=$list['length']?> mins</li>
			<li>Director: <?=$list['director']?></li>
			<?php if ($list['video_type'] == 'TVSHOW'): ?>
				<li>Number of Seasons: <?=$list['num_of_season']?></li>				
			<?php endif ?>
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