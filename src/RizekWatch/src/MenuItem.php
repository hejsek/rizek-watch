<?php

namespace RizekWatch\Src;

/**
 * @author Jakub Heyduk
 */
class MenuItem
{

	/**
	 * @var string
	 */
	public string $name;
	/**
	 * @var string
	 */
	private string $price;
	/**
	 * @var Restaurant
	 */
	private Restaurant $restaurant;


	/**
	 * @param string $name
	 * @param string $price
	 */
	public function __construct(string $name, string $price, Restaurant $restaurant)
	{
		$this->name = $name;
		$this->price = $price;
		$this->restaurant = $restaurant;
	}


	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}


	/**
	 * @return Restaurant
	 */
	public function getRestaurant(): Restaurant
	{
		return $this->restaurant;
	}


	/**
	 * @param string $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}


	/**
	 * @return string
	 */
	public function getPrice(): string
	{
		return $this->price;
	}


	/**
	 * @param string $price
	 */
	public function setPrice(string $price): void
	{
		$this->price = $price;
	}
}
