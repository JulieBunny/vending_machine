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
$vendorApi->itemButtonPressed(VendingItemEnum::appleJuice());
$vendorApi->addFund(new BillFive());
$vendorApi->itemButtonPressed(VendingItemEnum::appleJuice());
$vendorApi->addFund(new BillTen());
$vendorApi->itemButtonPressed(VendingItemEnum::appleJuice());
$vendorApi->itemButtonPressed(VendingItemEnum::orangeJuice());
