<?php

namespace Machine;

use Machine\Fund\BillFive;
use Machine\Fund\BillTen;
use Machine\Fund\FundTypeEnum;

class FundFactory
{

	/**
	 * VendingItemFactory constructor.
	 */
	public function __construct()
	{

	}

	public function make($enum)
	{
		switch ($enum) {
			case FundTypeEnum::BILL_FIVE:
				return new BillFive();
            case FundTypeEnum::BILL_TEN:
                return new BillTen();
		}
	}
}