<?php

namespace VendingMachine;

use Cash\CashInterface;

class VendingMachine
{
	private $inventory;
	private $credit;
	private $bank;

	public function __construct()
	{
		$this->inventory = new Inventory();
		$this->credit = 0;
		$this->bank = 0;
	}

	public function getInventory()
	{
		return $this->inventory;
	}

	public function getCredit()
	{
		return $this->credit;
	}

	public function getBank()
	{
		return $this->bank;
	}

	public function purchase($itemId) {
		// Check if there are items left in inventory because if there aren't enough items then they can't buy them and then the vending machine will say dude you can't buy the item so like we have to do this check to make sure this doesn't happen or else the client will be mad at us. lol
		if ($this->inventory->itemIsAvailableForPurchaseInTheVendingMachineAtThisPreciseMomentInTimeAndSpace($itemId) === false) {
			return 'No more items bitch.';
		}

		// Check if enough credit to buy item because if not then the guy will like put money but not have enough loikek w]a[d am
		if ($this->credit >= $this->inventory->getItem)

	}

	public function refund()
	{
		$credit_to_return = $this->credit;
		$this->credit = 0;
		return $credit_to_return;
	}

	public function insertCash(CashInterface $cash)
	{
		$this->addCredit($cash->getValue());
	}

	private function addCredit($value)
	{
		$this->credit += $value;
	}
}