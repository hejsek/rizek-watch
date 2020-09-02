<?php

namespace RizekWatch\Src;

/**
 * @package RizekWatch\Src
 */
class Restaurant
{

	/**
	 * @var string
	 */
	private string $name;
	/**
	 * @var string
	 */
	private string $url;
	/**
	 * @var int
	 */
	private int $id;
	/**
	 * @var array
	 */
	private array $menu;


	/**
	 * @param int $id
	 * @param string $name
	 * @param string $url
	 */
	public function __construct(int $id, string $name, string $url)
	{
		$this->name = $name;
		$this->url = $url;
		$this->id = $id;
	}


	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
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
	public function getUrl(): string
	{
		return $this->url;
	}


	/**
	 * @param string $url
	 */
	public function setUrl(string $url): void
	{
		$this->url = $url;
	}


	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}


	/**
	 * @param int $id
	 */
	public function setId(int $id): void
	{
		$this->id = $id;
	}


	/**
	 * @return array
	 */
	public function getMenu(): array
	{
		return $this->menu;
	}


	/**
	 * @param array $menu
	 */
	public function setMenu(array $menu): void
	{
		$this->menu = $menu;
	}
}
