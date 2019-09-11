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
		if(!isset($_POST['search'])){

	
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
			var_dump($_POST);
			$_POST['video_id'] = $_SESSION['video_id'];
			$result = $viewlistvideo->saveVideo($_POST);	
			if($result > 0)
			{
				$_SESSION['flash'] = 'Video added successfully';
			}
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
		  			<h1 style="display: inline;"><?=esc($heading)?></h1>
		  			<p style="color:#da2c2b;font-weight:bold;display: inline;
		  			    padding: 15px">(<strong><?=esc($list['rating'])?> / 10)
		  			    </strong></p>
			        <p>( <?=esc($list['video_type'])?> )</p>
		   			<a href="#">
			  			<img src="images/<?=esc_attr($list['image']) . '.jpg'?>" 
			  			alt="<?=esc_attr($list['title'])?>"/>
		  			</a> 
			  	<ul>
				   <li><a href="home.php?genre_id=<?=$genreList[0]['genre_id']?>"
				   	>Genre: <?=esc($genreList[0]['genre_name'])?></a></li>
					<li>Language: <?=label($list['language'])?></li>
					<li>Synopsis: <?=esc($list['synopsis'])?></li>
					<li>Plot: <?=esc($list['plot'])?></li>
					<li>Length: <?=esc($list['length'])?> mins</li>
					<li>Director: <?=esc($list['director'])?></li>
					<?php if ($list['video_type'] == 'TVSHOW'): ?>
					<li>Number of Seasons: <?=esc($list['num_of_season'])?></li>				
					<?php endif ?>
			  	</ul>
		  	<form method="post">
			  	<input type="hidden" name="csrf" value="<?=csrf()?>" />
			  	<select id="viewlist" name="viewlist">
					<option value="create_list">Create a new list</option>
					<?php if (!empty($viewlist_result)): ?>
						<?php foreach ($viewlist_result as $viewlist): ?>
							<option value="<?=esc_attr($viewlist['list_id'])?>" 
									selected="selected">
								<?=esc($viewlist['list_name'])?>
							</option>
						<?php endforeach ?>	
					<?php endif ?>
				</select>

				<div style="margin-top: 10px;" id="add_list">
					<input type="text" id="list_name" name="list_name">
				</div>
				<p>
					<input class="btn" style="margin-top:10px " type="submit" 
					name="button" id="button" value="Add to List">
				</p>
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