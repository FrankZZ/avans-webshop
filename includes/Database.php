<?php
/*
 * @author Frank Wammes
 * @version 0.1
 * @desc Database klasse
 */
require_once('definitions.php');

class Database
{
	private static $mysqlPointer;

	static function get()
	{
		global $config;

		if (@mysqli_ping(self::$mysqlPointer) == false)
		{
			self::$mysqlPointer = new mysqli
			(
				$config['dbHost'],
				$config['dbUser'],
				$config['dbPassword'],
				$config['dbDatabase'],
				$config['dbPort']
			);
		}

		return self::$mysqlPointer;
	}
}
