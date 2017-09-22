<?php

use Machine\Fund\BillFive;
use Machine\Fund\BillTen;
use Machine\Item\VendingItemEnum;
use Machine\VendingMachine;
use Machine\VendorApi;

/**
 * @param $className
 */
function __autoload($className) {
	$filename = "./". $className .".php";

	/** @var string $filename */
	include_once($filename);
}

$vendingMachine = new VendingMachine();
$vendorApi = new VendorApi($vendingMachine);

//Check prince
$vendorApi->itemButtonPressed(VendingItemEnum::appleJuice());

//Buying without enough funds
$vendorApi->addFund(new BillFive());
$vendorApi->itemButtonPressed(VendingItemEnum::appleJuice());

//TODO: Enough funds to buy but not enough to refund

//Successfully buy and refund
$vendorApi->addFund(new BillTen());
$vendorApi->itemButtonPressed(VendingItemEnum::appleJuice());

//Add funds again and buy orange juice
$vendorApi->addFund(new BillTen());

//No more stock for orange juice
$vendorApi->vendingMachine()->itemByEnum(VendingItemEnum::orangeJuice())->setStock(0);
$vendorApi->itemButtonPressed(VendingItemEnum::orangeJuice());

//Add back stock for orange juice
$vendorApi->vendingMachine()->itemByEnum(VendingItemEnum::orangeJuice())->addStock(10);
