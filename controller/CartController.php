<?php
require_once(CONTROLLER_DIR . '/iController.php');
class CartController implements iController
{
	function home()
	{
		Manager::generateToken(); //token verversen

		$cart = Loader::model('Cart');

		$view = Loader::view();
		$view->token = Manager::getToken();
		$view->products = $cart->getProducts();
		$view->load('Cart');
	}

	function add($params)
	{
		if (!Manager::checkToken())
		{
			return $this->home();
		}

		Manager::fetchProducts();
		if (!empty($params) && array_key_exists($params[0], Manager::$maProducts))
		{
			$cart = Loader::model('Cart');
			$cart->add(Manager::$maProducts[$params[0]]);
		}
		$this->home();
	}

	function remove($params)
	{
		if (!Manager::checkToken())
		{
			return $this->home();
		}
		Manager::fetchProducts();

		if (!empty($params) && array_key_exists($params[0], Manager::$maProducts))
		{
			$cart = Loader::model('Cart');
			$cart->remove(Manager::$maProducts[$params[0]]);
		}

		$this->home();
	}

	function set($params)
	{
		if (!Manager::checkToken())
		{
			return $this->home();
		}

		Manager::fetchProducts();
		if (count($params) == 2 && is_numeric($params[1]) && array_key_exists($params[0], Manager::$maProducts))
		{
			$cart = Loader::model('Cart');
			$cart->set(Manager::$maProducts[$params[0]], $params[1]);
		}
		$this->home();
	}
}
