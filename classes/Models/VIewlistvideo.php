<?php 

namespace App\Models;

class Viewlistvideo extends Model
{
	protected $table = 'view_list_video';

	public function fetchVideos($listid)
	{
		$query = "SELECT {$this->table}.*,
							vid_collection.*,
							view_list.*
							FROM 
							{$this->table} 
							JOIN vid_collection USING(video_id)
							JOIN view_list USING(list_id)
							WHERE {$this->table}.list_id = :id";
		$params = array(':id' => $listid);
		$stmt = static::$dbh->prepare($query);
		$stmt->execute($params);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	
}