<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Frank
 * Date: 12-12-12
 * Time: 11:29
 * To change this template use File | Settings | File Templates.
 */
class View
{
	private $vars;

	function __construct()
	{
		$this->vars = array('cart' => Loader::model('Cart'));
	}

	function __set($key, $value)
	{
		$this->vars[$key] = $value;
	}

	function load($viewName, $return = false)
	{
		$file = VIEW_DIR . '/' . $viewName . 'View.php';

		if(file_exists($file))
		{
			if($return)
			{
				ob_start();
			}

			extract($this->vars);

			global $links;
			require_once(VIEW_DIR . '/Header.php');
			require_once($file);
			require_once(VIEW_DIR . '/Footer.php');

			if($return)
			{
				return ob_get_clean();
			}
		}
		else
		{
			return null;
		}
	}
}