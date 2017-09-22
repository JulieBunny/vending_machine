<?php

namespace Machine\Transaction;


use Machine\Fund\FundCollection;
use Machine\Wallet\Wallet;

class VendingMachineTransaction implements Transaction
{
    /**
     * @var Wallet
     */
    private $buyerWallet;
    /**
     * @var
     */
    private $sellerWallet;


    /**
     * VendingMachineTransaction constructor.
     *
     * @param Wallet         $buyerWallet
     * @param                $sellerWallet
     */
    public function __construct(Wallet $buyerWallet, $sellerWallet)
    {
        $this->buyerWallet = $buyerWallet;
        $this->sellerWallet = $sellerWallet;
    }


    /**
	 * @param FundCollection $collection
	 */
	public function addFunds(FundCollection $collection)
	{
        $this->buyerWallet->funds()->addFunds($collection);
	}

	/**
	 * @return FundCollection
	 */
	public function refund(): FundCollection
	{
	    $temp = clone $this->buyerWallet->funds();
		$this->buyerWallet->funds()->clear();
		return $temp;
	}

	/**
	 * @return Wallet
	 */
	public function buyerFunds(): Wallet
	{
        return $this->buyerWallet;
	}

	/**
	 * @return Wallet
	 */
	public function sellerFunds(): Wallet
	{
        return $this->sellerWallet;
	}

	public function setSellerFunds(Wallet $wallet)
	{
        $this->sellerWallet = $wallet;
	}

	public function setBuyerFunds(Wallet $wallet)
	{
        $this->buyerWallet = $wallet;
	}
}