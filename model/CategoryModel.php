<?php
class CategoryModel
{
	public $id;
	public $name;
	public $parent;
	public $children;
	public $products;

	function __construct()
	{
		$this->children = array();
		$this->products = array();
	}

	function getProducts($all = true)
	{
		$products = $this->products;

		if ($all == true)
		{
			foreach ($this->children as $cat)
			{
				$products = array_merge($products, $cat->getProducts(true));
			}
		}
		echo print_r($products);
		return $products;
	}
}
