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

	public function saveVideo($data)
	{

		$query1 = "SELECT * FROM {$this->table} where list_id = :list_id and video_id = :video_id";

		$params = array(':list_id' => $data['viewlist'],
						':video_id' => $data['video_id']);

		$stmt1 = static::$dbh->prepare($query1);
		$stmt1->execute($params);
		$count = $stmt1->rowCount();
		
		if($count != 1)
		{

		$query = "INSERT INTO {$this->table} (list_id,video_id) VALUES(:list_id, :video_id)";

		$stmt = static::$dbh->prepare($query);

		$stmt->execute($params);

		return static::$dbh->lastInsertId();

		}
		else{
			$_SESSION['flash'] = 'Video already exists in this list';
			return false;
		}
	}
	
}