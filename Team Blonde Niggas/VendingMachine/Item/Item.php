<?php
/**
 * Created by PhpStorm.
 * User: Aiga
 * Date: 2017-09-21
 * Time: 7:50 PM
 */

namespace VendingMachine\Item;


class Item
{
	private $definition;

	public function __construct(ItemDefinition $itemDefinition)
	{
		$this->definition = $itemDefinition;
	}

	public function getDefinition() {
		return $this->definition;
	}
}