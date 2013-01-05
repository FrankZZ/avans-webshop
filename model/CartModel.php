<?php

class CartModel
{
	function __construct()
	{
		session_start();

		if (!isset($_SESSION['fnj_winkelwagen_producten']))
		{
			$_SESSION['fnj_winkelwagen_producten'] = array();
		}
	}

	function getProductCount()
	{
		$count = 0;
		if (isset($_SESSION) && isset($_SESSION['fnj_winkelwagen_producten']))
		{
			foreach ($_SESSION['fnj_winkelwagen_producten'] as $prod)
			$count += $prod;
		}
		return $count;
	}

	function getTotal()
	{
		$total = 0.0;

		$products = $this->getProducts();

		foreach($products as $prod)
		{
			$total += ($prod[0]->price * $prod[1]);
		}
		return $total;
	}

	function getProducts()
	{
		Manager::fetchProducts();

		$products = array();

		if (isset($_SESSION) && isset($_SESSION['fnj_winkelwagen_producten']))
		{
			foreach ($_SESSION['fnj_winkelwagen_producten'] as $prodId => $quantity)
			{
				$products[] = array(Manager::$maProducts[$prodId], $quantity);
			}
		}

		return $products;

	}

	function add($product)
	{
		if (isset($_SESSION) && isset($_SESSION['fnj_winkelwagen_producten']))
		{
			if (isset($_SESSION['fnj_winkelwagen_producten'][$product->id]))
			{
				$_SESSION['fnj_winkelwagen_producten'][$product->id]++;
			}
			else
			{
				$_SESSION['fnj_winkelwagen_producten'][$product->id] = 1;
			}

		}
	}

	function remove($product)
	{
		if (isset($_SESSION) && isset($_SESSION['fnj_winkelwagen_producten']))
		{
			if (isset($_SESSION['fnj_winkelwagen_producten'][$product->id]))
			{
				$_SESSION['fnj_winkelwagen_producten'][$product->id]--;

				if ($_SESSION['fnj_winkelwagen_producten'][$product->id] <= 0)
				{
					unset($_SESSION['fnj_winkelwagen_producten'][$product->id]);
				}
			}
			else
			{
				unset($_SESSION['fnj_winkelwagen_producten'][$product->id]);
			}
		}
	}

	function set($product, $quantity)
	{
		if (isset($_SESSION) && isset($_SESSION['fnj_winkelwagen_producten']))
		{
			$_SESSION['fnj_winkelwagen_producten'][$product->id] = $quantity;

			if ($_SESSION['fnj_winkelwagen_producten'][$product->id] <= 0)
			{
				unset($_SESSION['fnj_winkelwagen_producten'][$product->id]);
			}
		}
	}


}
