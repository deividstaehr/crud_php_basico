<?php

require_once __APP_ROOT__ . '/vendor/autoload.php';

$assets = substr(__APP_ROOT__,strpos(__APP_ROOT__, 'www'));

Core\Path::register([
	'ROOT'   => __APP_ROOT__,
	'ASSETS' => substr($assets, 4)
]);
