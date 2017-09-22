<?php

namespace Machine\Transaction;


use Machine\Fund\FundCollection;
use Machine\Wallet\Wallet;

interface Transaction
{
	/**
	 * @param FundCollection $collection
	 */
	public function addFunds(FundCollection $collection);

	/**
	 * @return FundCollection
	 */
	public function refund(): FundCollection;

	/**
	 * @return Wallet
	 */
	public function buyerFunds(): Wallet;

	/**
	 * @return Wallet
	 */
	public function sellerFunds(): Wallet;

	public function setSellerFunds(Wallet $wallet);
	public function setBuyerFunds(Wallet $wallet);
}