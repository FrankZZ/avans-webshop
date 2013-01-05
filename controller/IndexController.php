<?php
/**
 * @author Frank Wammes
 * @date 12-12-12
 * @time 18:42
 * @version 0.1
 * @desc
 */

require_once(CONTROLLER_DIR . '/iController.php');
require_once(VIEW_DIR . '/View.php');

class IndexController implements iController
{
	function home()
	{
		$view = new View();
		$view->load('Index');
	}
}
