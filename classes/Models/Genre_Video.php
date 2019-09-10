<?php 

namespace App\Models;

/**
 * Genre Video Class
 */
class Genre_Video extends Model
{
	protected $table = 'genre_video';

	protected $key = 'video_id';
	
	/**
	 * Get Genre of Video
	 * @param  String $id [video_id]
	 * @return Array      [genres]
	 */
	public function getGenreOfVideo($id)
	{

		$query = "SELECT {$this->table}.*,
							genre.*
							FROM 
							{$this->table}  
							JOIN genre 
							ON({$this->table}.genre_id = genre.genre_id)
							WHERE {$this->table}.video_id = :id";

		$params = array(':id' => $id);
		$stmt = static::$dbh->prepare($query);
		$stmt->execute($params);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	/**
	 * Get All Videos of a genre
	 * @param  int    $genreid [genre id]
	 * @return Array           [Videos]
	 */
	public function getAllVideoOfAGenre($genreid)
	{
		$query = "SELECT {$this->table}.*,
							genre.*,
							vid_collection.*
							FROM 
							{$this->table}
							JOIN vid_collection 
							ON ({$this->table}.video_id = vid_collection.video_id)  
							JOIN genre 
							ON({$this->table}.genre_id = genre.genre_id)
							WHERE {$this->table}.genre_id = :genreid";

		$params = array(':genreid' => $genreid);
		$stmt = static::$dbh->prepare($query);
		$stmt->execute($params);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	/**
	 * Get all comedies both tv shows and movies
	 * @return [type] [description]
	 */
	public function fetchAllComedies()
	{
		$genreid = 7;
		$query = "SELECT {$this->table}.*,
							genre.*,
							vid_collection.*
							FROM 
							{$this->table}
							JOIN vid_collection 
							ON ({$this->table}.video_id = vid_collection.video_id)  
							JOIN genre 
							ON({$this->table}.genre_id = genre.genre_id)
							WHERE {$this->table}.genre_id = :genreid";

		$params = array(':genreid' => $genreid);
		$stmt = static::$dbh->prepare($query);
		$stmt->execute($params);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}


}