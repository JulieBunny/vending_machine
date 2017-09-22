<?php
namespace Machine;

use Machine\Wallet\ConcreteWallet;
use Machine\Wallet\Wallet;

class VendingMachine
{
    private $items;
    private $wallet;

    public function itemByEnum($vendingItemEnum)
    {
        return $this->items()->itemByEnum($vendingItemEnum);
    }
    
	/**
	 * @return VendingItemCollection
	 */
	public function items(){
        return $this->items = isset($this->items)? $this->items : new VendingItemCollection();
    }

	/**
	 * Get the wallet to do money related transactions.
	 * @return wallet
	 */
	public function wallet(){
	    return $this->wallet = isset($this->wallet)? $this->wallet : new ConcreteWallet();
    }
}