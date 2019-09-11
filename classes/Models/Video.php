<?php 

namespace App\Models;

/**
 * 	Video Class
 */
class Video extends Model
{
	protected $table = 'vid_collection';

	protected $key = 'video_id';

	/**
	 * Inserts a new record in Video Table
	 * @param   Video  $video 
	 * @return  int
	 */
	public function save($video)
	{	
		$query = "INSERT INTO {$this->table} 
		(title, 
		video_type,
		language,
		rating,
		synopsis,
	    num_of_season,
	    release_date) 
	    VALUES
	    (:title,
	     :video_type,
	     :language,
	     :rating,
	     :synopsis,
	     :num_of_season, 
	     :release_date)";

		foreach ($video as $key => $value) {
			if($key != 'table' && $key != 'key')
	    	$params[$key] = $value;
		}

		$stmt = static::$dbh->prepare($query);

		$stmt->execute($params);

		return static::$dbh->lastInsertId();
	}
		

	/**
	 * 	Edit existing records in the table using the video_id
	 * @param  Array $data  [Video Details]
	 * @return [type]       [description]
	 */
	public function update($data)
	{
		$data['release_date'] = trim($data['release_date']); 
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

        $query1 = 'UPDATE genre_video
        SET 
        genre_id = :genre_id
        WHERE 
        video_id = :video_id';

      	$stmt = static::$dbh->prepare($query);
      	$stmt1 = static::$dbh->prepare($query1);

      	$params = array('title' => $data['title'],
              'video_type' => $data['video_type'],
              'language' => $data['language'],
              'rating' => $data['rating'],
              'synopsis' => $data['synopsis'],
              'num_of_season' => $data['num_of_season'],
              'release_date' => $data['release_date'],
          	  'video_id' => $data['video_id']);

      	$params1 = array('genre_id' => $data['genre'],
      					'video_id' => $data['video_id']);

      	$stmt1->execute($params1);
        return $stmt->execute($params);
	}

	/**
	 * Returns search results based on title
	 * @param  String $data [Search keyword]
	 * @return Array        [Records returned]
	 */
	public function searchVideo($data)
	{
		$search = '%'. $data . '%';
		$query = "SELECT * 
				  FROM 
				  vid_collection
				  WHERE title LIKE :search ";
		$stmt = static::$dbh->prepare($query);
		$params = array(':search' => $search);
		$stmt->execute($params);
		$count = $stmt->rowCount();
		if ($count > 0) {
			$_SESSION['flash'] = 'Search results returned 1 - '.$count;
		}else{
			$_SESSION['flash'] = 'No records found';

		}
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	/**
	 * Fetch all tv shows
	 * @return Array   [tv shows]
	 */
	public function fetchAllTvShows()
	{
		$query = "SELECT * FROM {$this->table} 
				  where video_type= 'TVSHOW'";
		$stmt = static::$dbh->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	/**
	 * Fetch all the movies
	 * @return Array [Movies]
	 */
	public function fetchAllMovies()
	{
		$query = "SELECT * FROM {$this->table} 
				  where 
				  video_type= 'MOVIES'";
		$stmt = static::$dbh->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	/**
	 * Sorting based on the below passed params
	 * @param  [String] $videotype 
	 * @param  [String] $property  [property name]
	 * @param  [type] $order       [ascending or descending]
	 * @return Array               [Sorted Array]
	 */
	public function sort($videotype, $property, $order)
	{
		$query = "SELECT * FROM {$this->table} 
		where video_type= :video_type ORDER BY $property $order";
		$params = array(':video_type' => $videotype);
		$stmt = static::$dbh->prepare($query);
		$stmt->execute($params);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

}