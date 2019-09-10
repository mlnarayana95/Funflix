<?php 

namespace App\Models;

class Genre_Video extends Model
{
	protected $table = 'genre_video';

	protected $key = 'video_id';
	
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