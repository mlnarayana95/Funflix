<?php 


/**
 * Model Page
 * @last_update: 2019-09-13
 * @author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

namespace App\Models;

/**
 * Model Class
 */
class Model
{

	protected static $dbh;

	/**
	 * Initialize database handle for all models
	 * @param  [type] $dbh [description]
	 */
	public static function init(\PDO $dbh)
	{
		static::$dbh = $dbh;
	}

	/**
	 * Return all results from Model table
	 * @return Mixed array or bool
	 */
	public function all()
	{
		$query = "SELECT * FROM {$this->table}";
		$stmt = static::$dbh->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	/**
	 * Returns one record based on the id passed
	 * @param  Int    $id    [ID]
	 * @return Array         [Entire record]
	 */
	public function one($id)
	{
		$query = "SELECT * FROM {$this->table} WHERE {$this->key} = :id";
		$params = array(':id' => $id);
		$stmt = static::$dbh->prepare($query);
		$stmt->execute($params);
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	/**
	 * Return's the count of the column name and table parameters passed.
	 * @param  [type] $videotype [description]
	 * @return [type]            [description]
	 */
	public function returnCount($videotype = NULL)
	{	
		$query = "SELECT COUNT({$this->key}) AS COUNT FROM {$this->table}";
		$stmt = static::$dbh->prepare($query);
		$stmt->execute();
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

}

