<?php

namespace App\Models;

class DatabaseLogger extends Model
{	

	protected $table = 'log';

	protected $key = 'id';

	/**
	 * Writes log data to the database
	 * @param  String $event [Log Data]
	 */
	public function write($event)
	{
		$query = "INSERT INTO log(event)
					VALUES(:event)";
		$params = array(':event' => $event);
		$stmt = static::$dbh->prepare($query);
		return $stmt->execute($params);
	}

	public function all()
	{
		$query = "SELECT * FROM 
					log 
					LIMIT 6";
		$stmt = static::$dbh->prepare($query);
		$stmt->execute();
		return  $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

}