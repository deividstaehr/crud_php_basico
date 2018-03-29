<?php

namespace Core;

use Core\PDOFactory;

class DB
{
	private static $conn;
	private static $dbname;

	private function __construct() {}

	public static function begin($database = 'database')
	{
		self::$conn = PDOFactory::make($database);

		self::$conn->beginTransaction();
	}

	public static function commit()
	{
		if (empty(self::get())) {
			throw new \Exception('Transaction aborted (empty connection)');
		}
		self::$conn->commit();
		self::closeConnection();
		return true;
	}

	public static function rollback()
	{
		if (empty(self::get())) {
			throw new \Exception('Transaction aborted (empty connection)');
		}
		self::$conn->rollback();
		self::closeConnection();
		return true;
	}

	public static function get()
	{
		return self::$conn;
	}

	private static function closeConnection()
	{
		self::$conn = null;
	}
}