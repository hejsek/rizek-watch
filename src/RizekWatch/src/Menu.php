<?php
namespace RizekWatch\Src;
/**
 * @author Jakub Heyduk
 */
class Menu
{
    private array $items;

    public function __construct($items = [])
    {
        $this->items = $items;
    }

    public function addMenuItem(MenuItem $item)
    {
        $this->items[] = $item;
    }

    public function getItems()
    {
        return $this->items;
    }
}
