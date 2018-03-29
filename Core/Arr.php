<?php

namespace Core;

final class Arr
{
	private function __construct() {}

	public static function is($arr)
	{
		return is_array($arr);
	}

	public static function in($prop, $arr)
	{
		if (self::is($arr)) return in_array($prop, $arr);
		
		return FALSE;
	}

	public static function inKeys($key, $arr)
	{
		$arrKeys = array_keys($arr);
		
		return (self::in($key, $arrKeys)) 
			? TRUE
			: FALSE;
	}

	public static function valueInKey($key, $arr, $return = FALSE)
	{
		if (self::is($key) && self::is($arr)) {
			foreach ($key as $index => $value) {
				if (self::in($index, $arr)) {
					if ($return === TRUE) {
						return $index;
					}
					return TRUE;
				}
			}		
		} 
		return FALSE;
	}

	public static function separate($glue, $arr)
	{
		return (Arr::is($arr)) ? implode($glue, $arr) : NULL;
	}

	public static function transform($str)
	{
		return (Arr::is($arr)) ? explode($str) : NULL;
	}
}