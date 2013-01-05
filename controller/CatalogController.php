<?php
require_once(MODEL_DIR . '/Manager.php');
require_once(CONTROLLER_DIR . '/iController.php');

class CatalogController implements iController
{
	function home()
	{
		Manager::fetchCategories();
		Manager::fetchProducts();

		$view = new View();

		$view->categoryName = 'Aanbiedingen';
		$view->products = Manager::$categories[DEFAULT_CATEGORY]->getProducts();
		$view->token = Manager::getToken();
		$view->categories = Manager::$categories;


		$view->load('Catalog');
	}

	function category($params)
	{
		Manager::fetchCategories();
		Manager::fetchProducts();

		if (empty($params[0]) || !array_key_exists($params[0], Manager::$categories))
		{
			return $this->home();
		}
		$view = new View();

		$cat = Manager::$categories[$params[0]];

		$view->products = $cat->getProducts();
		$view->token = Manager::getToken();
		$view->categoryName = $cat->name;
		$view->categories = Manager::$categories;

		$view->load('Category');
	}

	function product($params)
	{
		Manager::fetchProducts();

		if (empty($params[0]) || !array_key_exists($params[0], Manager::$maProducts))
		{
			return $this->home();
		}

		$view = new View();

		$prod = Manager::$maProducts[$params[0]];
		$view->token = Manager::getToken();
		$view->categories = Manager::$categories;
		$view->product = $prod;

		$view->load('Product');
	}

	function search($params)
	{
		if (!isset($_POST))
		{
			return $this->home();
		}

		$searchString = $_POST['searchString'] ? $_POST['searchString'] : null;

		Manager::fetchProducts();
		$products = array();

		foreach (Manager::$maProducts as $prod)
		{
			if (stristr($prod->name, $searchString) || stristr($prod->summary, $searchString))
			{
				$products[] = $prod;
			}
		}

		$view = new View();

		$view->products = $products;
		$view->token = Manager::getToken();
		$view->categories = Manager::$categories;

		$view->load('SearchResult');

	}
}
