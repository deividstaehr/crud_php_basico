<?php

/**
 * Default Path
 */
define('__APP_ROOT__', dirname(__DIR__) . '/');

/**
 * Show errors
 */
ini_set('display_errors', '1');
ini_set('error_reporting', '1');

/**
 * Dump a variable a die
 *
 * @param   variable for debug
 * @return  void
 */
function dump($var) {
	echo "<pre>";

	var_dump($var);

	die();
}