<?php


/**
 * Database Logger Page
 * @last_update: 2019-09-13
 * @author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

namespace App\Models;


/**
 * Database Logger
 */
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

	/**
	 * Return log data
	 * @return Array  [Log data]
	 */
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