<?php

namespace Machine\Wallet;

use Machine\Fund\Fund;
use Machine\Fund\FundCollection;
use Machine\Fund\FundTypeEnum;

interface Wallet
{
	public function totalFunds();

	/**
	 * @return FundCollection
	 */
	public function funds(): FundCollection;

    /**
     * @param $fundTypeEnum
     *
     * @return Fund
     */
	public function getFundByType($fundTypeEnum): Fund;

	public function __toString();

    public function removeFunds($price);
}