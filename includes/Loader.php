<?php
/**
 * @author Frank Wammes
 * @date 13-12-12
 * @time 11:20
 * @version 0.1
 * @desc
 */
class Loader
{
	static private $models = array();

	static function view()
	{
		require_once(VIEW_DIR . '/View.php');
		return new View();
	}

	static function controller($name)
	{
		$path = CONTROLLER_DIR . '/' . ucfirst($name) . '.php';
		if (!file_exists($path))
		{
			$name = DEFAULT_CONTROLLER;
			$path = CONTROLLER_DIR . '/' . ucfirst($name) . '.php';
		}
			require_once($path);
			return new $name();
	}


	static function model($name)
	{
		$name .= 'Model';

		if (array_key_exists($name, self::$models))
		{
			return self::$models[$name];
		}

		$path = MODEL_DIR . '/' . ucfirst($name) . '.php';
		if (!file_exists($path))
		{
			return null;
		}

		require_once($path);

		$model = new $name();

		self::$models[$name] = $model;

		return $model;
	}
}
