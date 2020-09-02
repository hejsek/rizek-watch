<?php

namespace RizekWatch\Src;

use \GuzzleHttp\Client;
use \GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Jakub Heyduk
 */
class Parser
{

	/**
	 * @var Client
	 */
	private Client $http;
	private string $url;
	private ResponseInterface $response;
	private array $restaurants;


	public function __construct(string $url, $loadOnInit = TRUE)
	{
		$this->url = $url;
		$this->http = $this->prepareHttpClient();

		if ($loadOnInit) {
			$this->response = $this->getMenickaApiResponse();
			$this->restaurants = $this->findAllRestaurants();
		}
	}


	/**
	 * @return \GuzzleHttp\Client
	 */
	private function prepareHttpClient()
	{
		return new Client();
	}


	/**
	 * @param string $url
	 * @return ResponseInterface
	 * @throws GuzzleException
	 */
	private function getMenickaApiResponse(): ResponseInterface
	{
		$res = $this->http->request("GET", $this->url);

		if ($res->getStatusCode() != 200) {
			throw new \Exception("Bad status code");
		}

		return $res;
	}


	/**
	 * @param string $searchedString
	 * @param string $respBody
	 */
	public function findAllRestaurants(): array
	{
		$restaurants = [];
		/**
		 * @var $body \QueryPath\DOMQuery
		 */
		$body = \QueryPath::withHTML5(iconv('CP1250', 'UTF-8//IGNORE', $this->response->getBody()));


		/**
		 * @var $restaurantEl \QueryPath\DOMQuery
		 * @var $offer \QueryPath\DOMQuery
		 */
		foreach ($body->find("div.menicka_detail") as $restaurantEl) {
			$menuItems = [];

			$el = $restaurantEl->find("div.nazev a");
			$restaurantName = $el->text();
			$restaurantUrl = $el->attr("href");
			$restaurantId = 0000;

			$restaurant = new Restaurant($restaurantId, $restaurantName, $restaurantUrl);


			foreach ($restaurantEl->find("div.nabidka_1") as $offer) {
				$price = $offer->next();
				$menuItems[] = new MenuItem($offer->text(), $price->text(), $restaurant);
			}

			if (count($menuItems) > 0) {
				$restaurant->setMenu($menuItems);
				$restaurants[] = $restaurant;
			}
		}

		return $restaurants;
	}


	/**
	 * @param string $searched
	 *    todo - přidat víc searched
	 */
	public function findOffers(string $searched): array
	{
		$foundOffers = [];
		/**
		 * @var Restaurant $restaurant
		 */
		foreach ($this->restaurants as $restaurant) {
			/**
			 * @var MenuItem $menuItem
			 */
			foreach ($restaurant->getMenu() as $menuItem) {
				if (strpos($menuItem->getName(), $searched) !== FALSE) {
					$foundOffers[] = $menuItem;
				}
			}
		}

		return $foundOffers;
	}
}
