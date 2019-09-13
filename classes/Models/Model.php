<?php 

namespace App\Models;

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

	public function one($id)
	{
		$query = "SELECT * FROM {$this->table} WHERE {$this->key} = :id";
		$params = array(':id' => $id);
		$stmt = static::$dbh->prepare($query);
		$stmt->execute($params);
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function returnCount($videotype = NULL)
	{	
		$query = "SELECT COUNT({$this->key}) AS COUNT FROM {$this->table}";
		$stmt = static::$dbh->prepare($query);
		$stmt->execute();
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function aggregateFunctions()
	{

	}

}

