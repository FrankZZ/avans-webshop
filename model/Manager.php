<?php
require_once(MODEL_DIR . '/CategoryModel.php');
require_once(MODEL_DIR . '/ProductModel.php');

class Manager
{
	static public $categories = array();
	static public $maProducts;

	static function fetchProducts()
	{
		if (empty(self::$categories))
		{
			self::fetchCategories();
		}

		$query = "SELECT id, price, name, summary, description, image, category FROM product";

		$result = mysqli_query(Database::get(), $query);

		while ($product = $result->fetch_assoc())
		{
			$product = self::loadProduct($product);

			self::$maProducts[$product->id] = $product;
		}

	}

	private static function loadProduct($prodData)
	{
		$prod = new ProductModel();

		foreach ($prodData as $key => $value)
		{
			$prod->$key = $value;
		}

		$prod->category = self::$categories[$prodData['category']];
		$prod->category->products[] = $prod;

		return $prod;
	}

	static function fetchCategories()
	{
		$query = "SELECT id, name, parent FROM category;";

		$result = mysqli_query(Database::get(), $query);

		while ($cat = $result->fetch_assoc())
		{
			$cat = self::loadCategory($cat);

			self::$categories[$cat->id] = $cat;
		}

		foreach (self::$categories as $root)
		{
			foreach(self::$categories as $cat)
			{
				if ($cat != $root && $cat->parent === $root->id)
				{
					$cat->parent = $root;
					$root->children[] = $cat;
				}
			}
		}
		//echo '<pre>' . print_r(self::$categories, true) . '</pre>';
	}

	private static function loadCategory($catData)
	{
		$cat = new CategoryModel();

		//TODO checks inbouwen tegen typecast fouten

		$cat->id = (int) $catData['id'];
		$cat->name = $catData['name'];
		$cat->parent = (int) $catData['parent'];


		return $cat;
	}

	public static function generateToken()
	{
		if (!isset($_SESSION))
		{
			session_start();
		}

		$_SESSION['fnj_token'] = sha1(uniqid('AjjUWsQ--&u$^'));
	}

	public static function getToken()
	{
		if (!isset($_SESSION))
		{
			session_start();
		}

		if (!isset($_SESSION['fnj_token']))
		{
			self::generateToken();
		}

		return $_SESSION['fnj_token'];

	}

	public static function checkToken()
	{
		if (!isset($_SESSION))
		{
			session_start();
		}
		if (isset($_SESSION['fnj_token']) && isset($_POST['fnj_token']))
		{
			if (self::getToken() == $_POST['fnj_token'])
			{
				return true;
			}
		}
		return false;
	}
}

