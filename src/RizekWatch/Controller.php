<?php

namespace RizekWatch;

use RizekWatch\Src\Parser;

/**
 * @author Jakub Heyduk
 */
class Controller
{

	public function __construct()
	{
		$parser = new Parser("https://www.menicka.cz/brno.html");
		$offers = $parser->findOffers("řízek");

		// Tady bude odpálení notifikací do mobilu
		dump($offers);
	}
}
