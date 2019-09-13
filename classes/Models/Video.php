<?php 


/**
 * Video Page
 * @last_update: 2019-09-13
 * @author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

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
	public function save($data)
	{	
		
		try {	
		
		$query = "INSERT INTO {$this->table} 
		(title, 
		video_type,
		language,
		rating,
		synopsis,
		plot,
	    num_of_season,
	    release_date,
	    image,
	    length,
	    director) 
	    VALUES
	    (:title,
	     :video_type,
	     :language,
	     :rating,
	     :synopsis,
	     :plot,
	     :num_of_season, 
	     :release_date,
	 	 :image,
	 	 :length,
	 	 :director)";

	 	$params = array('title' => $data['title'],
           'video_type' => $data['video_type'],
           'language' => $data['language'],
           'rating' => $data['rating'],
           'synopsis' => $data['synopsis'],
           'plot' => $data['plot'],
           'image' => $data['image'],
           'length' => $data['length'],
           'director' => $data['director'],
           'num_of_season' => $data['num_of_season'],
           'release_date' => $data['release_date']);
	
		$stmt = static::$dbh->prepare($query);

		$stmt->execute($params);

		$id = static::$dbh->lastInsertId();

		$query = "INSERT INTO genre_video 
					(video_id,
					genre_id)
					VALUES
					(:video_id,
					:genre_id)";

		$params = array('video_id' => $id,
						'genre_id' => $data['genre']);

		$stmt = static::$dbh->prepare($query);

		$stmt->execute($params);

		return static::$dbh->lastInsertId();



		} catch (\PDOException $e) {

		if ($e->errorInfo[1] == 1062) {
       		$_SESSION['flash'] = 'Unable to Add New Video. Please check the data and try again';

    	}
	}
		}

	/**
	 * 	Edit existing records in the table using the video_id
	 * @param  Array $data  [Video Details]
	 * @return [type]       [description]
	 */
	public function update($data)
	{
		try {
			
		$data['release_date'] = trim($data['release_date']); 

        $query1 = 'UPDATE genre_video
        SET 
        genre_id = :genre_id
        WHERE 
        video_id = :video_id';

      	$stmt1 = static::$dbh->prepare($query1);

      	$params1 = array('genre_id' => $data['genre'],
      					'video_id' => $data['video_id']);

      	$stmt1->execute($params1);

      	$query = 'UPDATE vid_collection
          SET
          title = :title,
          video_type = :video_type,
          language = :language,
          rating = :rating,
          synopsis = :synopsis,
          plot = :plot,
          image = :image,
          length = :length,
          director = :director,
          num_of_season = :num_of_season,
          release_date = :release_date
          WHERE
          video_id = :video_id';
		
		$params = array('title' => $data['title'],
            'video_type' => $data['video_type'],
            'language' => $data['language'],
            'rating' => $data['rating'],
            'synopsis' => $data['synopsis'],
            'plot' => $data['plot'],
            'image' => $data['image'],
            'length' => $data['length'],
            'director' => $data['director'],
            'num_of_season' => $data['num_of_season'],
            'release_date' => $data['release_date'],
          	'video_id' => $data['video_id']);
      	
        $stmt = static::$dbh->prepare($query);

        return $stmt->execute($params);
        } catch (\PDOException $e) {
			
			if ($e->errorInfo[1] == 1062) {
	       		$_SESSION['flash'] = 'Video with that title and language already exists';

	    	}
		}
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

	public function delete($data)
	{

		$data['release_date'] = trim($data['release_date']);

		$query = "INSERT INTO archive
		  (title,
          video_type,
          language,
          rating,
          synopsis,
          plot,
          image,
          length,
          director,
          num_of_season,
          release_date)
          	    VALUES
	    (:title,
	     :video_type,
	     :language,
	     :rating,
	     :synopsis,
	     :plot,
	     :image,
	     :length,
	     :director,
	     :num_of_season, 
	     :release_date)";

		$params = array('title' => $data['title'],
            'video_type' => $data['video_type'],
            'language' => $data['language'],
            'rating' => $data['rating'],
            'synopsis' => $data['synopsis'],
            'plot' => $data['plot'],
            'image' => $data['image'],
            'length' => $data['length'],
            'director' => $data['director'],
            'num_of_season' => $data['num_of_season'],
            'release_date' => $data['release_date']);

		$stmt = static::$dbh->prepare($query);
		$stmt->execute($params);

		if ($stmt->rowCount() > 0)
		{
		

	        $query = 'DELETE FROM 
	        genre_video
	         WHERE 
	        video_id = :video_id';
	        $params1 = array('video_id' => $data['video_id']);
	        $stmt1 = static::$dbh->prepare($query);
		    $stmt1->execute($params1);

	        $query = 'DELETE FROM 
	        view_list_video
	          WHERE 
	        video_id = :video_id';
	        $stmt1 = static::$dbh->prepare($query);
	        $stmt1->execute($params1);

	        $query = 'DELETE FROM
			vid_collection
         		WHERE
        	video_id = :video_id';

	      	$stmt1 = static::$dbh->prepare($query);
	      	$stmt1->execute($params1);
	        return $stmt1->rowCount();
	    }
	}
	
	/**
	 * Returns Count of the movies and tv shows based on the value
	 * passed to the function
	 * @param  String $videotype [Video Type]
	 * @return Array             [Returns Count]
	 */
	public function returnCount($videotype = NULL)
	{
		$query = "SELECT COUNT(*) FROM 
				 {$this->table} AS COUNT
				  WHERE 
				  video_type = :video_type";

		$stmt = static::$dbh->prepare($query);
		$params = array(':video_type' => $videotype);
		$stmt->execute($params);
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	/**
	 * Returns Aggregate Values for tv shows and movies
	 * @param  String $videotype [Video]
	 * @return Array             [Aggregate Values]
	 */
	public function returnAggregate($videotype)
	{

		$query = "SELECT max(length),
						 min(length),
						 avg(length)
						 FROM 
						 vid_collection
						 WHERE 
						 video_type = :video_type";

		$stmt = static::$dbh->prepare($query);
		$params = array(':video_type' => $videotype);
		$stmt->execute($params);
		return $stmt->fetch(\PDO::FETCH_ASSOC);

	}

}