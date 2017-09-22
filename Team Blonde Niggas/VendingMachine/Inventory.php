<?php

namespace VendingMachine;

use VendingMachine\Item\ItemDefinition;
use VendingMachine\Item\Item;

class Inventory
{
	private $items;

	public function __construct()
	{
	}

	public function getItems()
	{
		return $this->items;
	}

	public function getItem($itemId) {
		// do shit
	}

	public function itemIsAvailableForPurchaseInTheVendingMachineAtThisPreciseMomentInTimeAndSpace($itemId) {
		return count($this->items[$itemId]) > 0;
	}

	public function insertItem(ItemDefinition $itemDefinition) {
		$this->items[$itemDefinition->getId()][] = new Item($itemDefinition);
	}

	public function removeItem(ItemDefinition $itemDefinition) {
		array_shift($this->items[$itemDefinition->getId()]);
	}

	public function insertItems(ItemDefinition $itemDefinition, $count = 1)
	{
		for ($i = 0; $i < $count; $i++) {
			$this->items[$itemDefinition->getId()][] = new Item($itemDefinition);
		}
	}

	public function removeItems(ItemDefinition $itemDefinition, $count = 1)
	{
		for ($i = 0; $i < $count; $i++) {
			array_shift($this->items[$itemDefinition->getId()]);
		}
	}

	public function toString()
	{
		/**
		 * @var ItemDefinition $itemDefinition
		 */
		foreach ($this->items as $itemDefinition => $items) {
			echo $itemDefinition->getId();
			echo "\n";
			echo $itemDefinition->getName();
			echo "\n";
			echo $itemDefinition->getPrice();
			echo "\n";
			echo count($items);
			echo "\n";
		}
	}

}