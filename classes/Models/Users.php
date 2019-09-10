<?php 

namespace App\Models;

/**
 * Users table
 */
class Users extends Model
{
  /**
   * @var string
   */
	protected $table = 'users';

  /**
   * @var string
   */
	protected $key = 'user_id';

	/**
	 * Inserts a new record in Video Table
	 * @param   Video  $video 
	 * @return  int
	 */
	public function createUser($video)
	{	      $query = "INSERT INTO
                    users
                        (first_name,
                        last_name,
                        street,
                        city,
                        postal_code,
                        province,
                        country,
                        phone,
                        email,
                        password)
                        VALUES
                        (:first_name, 
                        :last_name, 
                        :street, 
                        :city, 
                        :postal_code,
                        :province,
                        :country,
                        :phone,
                        :email,
                        :password)";
            
            // Preparing the query
            $stmt = static::$dbh->prepare($query);
            
            // Adding parameters to be passed to the query
            $params = array(
                ':first_name' => $video['first_name'],
                ':last_name'=> $video['last_name'],
                ':street'=> $video['street'],
                ':city'=> $video['city'],
                ':postal_code'=> $video['postal_code'],
                ':province' => $video['province'],
                ':country'=> $video['country'],
                ':phone'=> $video['phone'],
                ':email'=> $video['email_address'],
                ':password'=> $video['hashed_password'] );

            // Execute the query
            $stmt->execute($params);

            // Fetch the last inserted id value
            $user_id = static::$dbh->lastInsertId();

            return $user_id;
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
		$query = "SELECT * FROM vid_collection WHERE title LIKE :search ";
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
}