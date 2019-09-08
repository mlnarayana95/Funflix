<?php 

namespace App\Models;

/**
 * 	Viewlist Class
 */
class Viewlist extends Model
{
	protected $table = 'view_list';

	public function fetchListsForUser($userid)
	{
		$query = "SELECT * FROM {$this->table} WHERE user_id = :id";
		$params = array(':id' => $userid);
		$stmt = static::$dbh->prepare($query);
		$stmt->execute($params);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}


	public function save($data)
	{
		$query1 = "SELECT * FROM {$this->table} where user_id = :user_id and list_name = :list_name";

		$stmt1 = static::$dbh->prepare($query1);
		
		$count = $stmt1->rowCount();

		if($count = 0)
		{

		$query = "INSERT INTO {$this->table} (user_id,list_name) VALUES(:user_id, :list_name)";

		$params = array(':user_id' => $data['user_id'],
						'list_name' => $data['list_name']);

		$stmt = static::$dbh->prepare($query);

		$stmt->execute($params);

		return static::$dbh->lastInsertId();

		}
		else{
			$_SESSION['flash'] = 'List with that name already exists';
			return false;
		}
	}
}