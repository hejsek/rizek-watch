<?php

namespace RizekWatch\Src;

/**
 * @author Jakub Heyduk
 */
class Menu
{

	/**
	 * @var array|mixed
	 */
	private array $items;


	/**
	 * Menu constructor.
	 * @param array $items
	 */
	public function __construct($items = [])
	{
		$this->items = $items;
	}


	/**
	 * @param MenuItem $item
	 */
	public function addMenuItem(MenuItem $item)
	{
		$this->items[] = $item;
	}


	/**
	 * @return array|mixed
	 */
	public function getItems()
	{
		return $this->items;
	}
}
