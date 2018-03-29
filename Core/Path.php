<?php

namespace Core;

class Path
{
	protected static $paths = [];

	private function __construct() { }

	public static function register($path)
	{
		self::$paths = array_merge(self::$paths, $path);
	}

	public static function load($alias)
	{
		if (isset(self::$paths[$alias])) {
			return self::$paths[$alias];
		}
		
		throw new \Exception("Path not found");
	}
}