<?php

namespace Machine;

use Machine\Fund\Fund;
use Machine\Fund\FundCollection;
use Machine\Item\VendingItem;
use Machine\Transaction\Transaction;
use Machine\Transaction\VendingMachineTransaction;
use Machine\Wallet\ConcreteWallet;

class VendorApi
{
	/**
	 * @var VendingMachine
	 */
	private $machine;

	/**
	 * @var Transaction
	 */
	private $transaction = null;

	/**
	 * VendorApi constructor.
	 * @param VendingMachine $machine
	 */
	public function __construct(VendingMachine $machine)
	{
		$this->machine = $machine;
	}

	public function addFund(Fund $fund)
	{
		if(empty($this->transaction))
		{
			$this->transaction = new VendingMachineTransaction(new ConcreteWallet(), new ConcreteWallet());
			$this->transaction->setSellerFunds($this->machine->wallet());
			$this->transaction->setBuyerFunds(new ConcreteWallet());
		}
		$this->transaction->addFunds(new FundCollection([$fund]));
        echo 'Funds added in transaction: '.$fund."\n";
        echo $this->transaction->buyerFunds()."\n";
	}

	/**
	 * @return bool
	 */
	public function buttonRefundPressed()
	{
		if(empty($this->transaction)){
			echo 'Nothing to refund'."\n";
			return false;
		}

		//TODO checks (inventory, funds)
		$funds = $this->transaction->buyerFunds();
		$this->transaction = null;
		echo 'refunded: '.$funds."\n";
		return true;
	}

	public function itemButtonPressed($vendingItemEnum)
	{
        $item = $this->getMachine()->itemByEnum($vendingItemEnum);

		if(empty($this->transaction))
		{
			$this->displayItemPrice($item);
			return;
		}

		$this->buyItem($item);
	}

	/**
	 * @param VendingItem $item
	 */
	private function buyItem(VendingItem $item)
	{
        if($this->transaction->buyerFunds()->totalFunds() > $item->price() * 100){
            echo 'Bought: '.$item."\n";
            //TODO: check if vending machine is able to refund
            //$successfulFundsUsed = $this->transaction->buyerFunds()->removeFunds($item->price());
        }
        else {
            echo "Not enough funds to buy \n";
        }
	}

	private function displayItemPrice(VendingItem $item)
	{
		echo $item."\n";
	}

	/**
	 * @param VendingMachine $machine
	 * @return VendorApi
	 */
	public function setMachine(VendingMachine $machine): VendorApi
	{
		$this->machine = $machine;
		return $this;
	}

	/**
	 * @return VendingMachine
	 */
	public function getMachine(): VendingMachine
	{
		return $this->machine;
	}
}