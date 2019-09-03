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
		
	public function update($data)
	{
		$data['release_date'] = date("Y-m-d H:i:s", strtotime($data['release_date'])); 
		$query = 'UPDATE vid_collection
          SET
          title = :title,
          video_type = :video_type,
          language = :language,
          rating = :rating,
          synopsis = :synopsis,
          num_of_season = :num_of_season,
          release_date = :release_date
          WHERE
          video_id = :video_id';

      	$stmt = static::$dbh->prepare($query);

      	$params = array('title' => $data['title'],
              'video_type' => $data['video_type'],
              'language' => $data['language'],
              'rating' => $data['rating'],
              'synopsis' => $data['synopsis'],
              'num_of_season' => $data['num_of_season'],
              'release_date' => $data['release_date'],
          	  'video_id' => $data['video_id']);

        return $stmt->execute($params);
	}
}