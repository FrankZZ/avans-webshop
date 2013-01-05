<?php
$start = microtime();
require_once('includes/definitions.php');
require_once(VIEW_DIR . '/View.php');
require_once(INCLUDE_DIR . '/Database.php');
require_once(MODEL_DIR . '/Manager.php');
require_once(INCLUDE_DIR . '/Loader.php');
/*
*	@author Frank Wammes
*/

$uri = explode('/', trim(URI, '/'), 3);

$params =		@$uri[2]	? explode('/', trim($uri[2], '/'))								: array();
$action =		@$uri[1]	? preg_replace('/[^a-zA-Z0-9]+/', '', $uri[1])					: 'home';
$controller =	@$uri[0]	? preg_replace('/[^a-zA-Z0-9]+/', '', $uri[0]) . 'Controller'	: DEFAULT_CONTROLLER;

$controller = Loader::controller($controller);

if ((method_exists($controller, $action) &&
	is_callable(array($controller, $action))) == false)
{
	$action = 'home';
}

$controller->$action($params);

echo "\n<!--\n";
echo "\nServed in " . (microtime() - $start) . "ms\n";
echo "\n-->";