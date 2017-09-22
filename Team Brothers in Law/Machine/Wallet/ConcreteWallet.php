<?php

namespace Machine\Wallet;

use Machine\Fund\Fund;
use Machine\Fund\FundCollection;

Class ConcreteWallet implements Wallet
{
    private $funds;

    /**
     * ConcreteWallet constructor.
     *
     * @param $funds
     */
    public function __construct($funds = null)
    {
        if(!empty($funds))
            $this->funds = $funds;
        else
            $this->funds = new FundCollection();
    }

    /**
     * @return float
     */
    public function totalFunds()
	{
        return $this->funds->total();
	}

	/**
	 * @return FundCollection
	 */
	public function funds(): FundCollection
	{
        return $this->funds;
	}

    /**
     * @param $fundTypeEnum
     *
     * @return Fund
     */
	public function getFundByType($fundTypeEnum): Fund
	{
        $this->funds->fundByType($fundTypeEnum);
	}

	public function __toString()
	{
        return 'Total available funds: '.number_format($this->totalFunds() / 100, 2).'$';
	}

    public function removeFunds($price)
    {
        // TODO: Implement removeFunds() method.
    }
}