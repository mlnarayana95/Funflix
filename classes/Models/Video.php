<?php 

namespace App\Models;

class Video extends Model
{
	protected $table = 'vid_collection';

	protected $key = 'video_id';

	public $title;

	public $video_type;

	public $language;

	public $rating;

	public $synopsis;

	public $num_of_season;

	public $release_date;

	public function __construct($title, $video_type, $language, $rating,$synopsis,$num_of_season, $release_date){
		$this->title = $title;
	    $this->video_type = $video_type;
		$this->language = $language;
		$this->rating = $rating;
		$this->synopsis = $synopsis;
		$this->num_of_season = $num_of_season;
		$this->release_date = $release_date;
	}

	public function save($video)
	{	
		$query = "INSERT INTO {$this->table} (title, video_type, language, rating, synopsis, num_of_season, release_date) VALUES(:title, :video_type, :language, :rating, :synopsis, :num_of_season, :release_date)";

		foreach ($video as $key => $value) {
			if($key != 'table' && $key != 'key')
	    	$params[$key] = $value;
		}

		$stmt = static::$dbh->prepare($query);

		$stmt->execute($params);

		return static::$dbh->lastInsertId();
	}
		


	

	public function update()
	{

	}
}