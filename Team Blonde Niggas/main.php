<?php

use Cash\CashInterface;
use Cash\Coin;
use Cash\Bill;
use VendingMachine\VendingMachine;
use VendingMachine\Item\ItemDefinition;

function __autoload($classname) {
	$filename = "./". str_replace('\\', '/', $classname) .".php";
	include_once($filename);
}

$vendingMachine = new VendingMachine();

$vendingMachine->getInventory()->insertItems(new ItemDefinition("Grape Juice Can", 250));
$vendingMachine->getInventory()->insertItems(new ItemDefinition("Apple Juice Can", 275));
$vendingMachine->getInventory()->insertItems(new ItemDefinition("Orange Juice Can", 300));

$vendingMachine->insertCash(new Bill(500));

echo "\n";
$vendingMachine->getInventory()->toString();
echo $vendingMachine->getBalance();
echo "\n";
echo "\n";
