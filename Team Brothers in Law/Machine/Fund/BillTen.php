<?php

namespace Machine\Fund;


class BillTen implements Fund
{

    /**
     * BillFive constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return float
     */
    public function value(): float
    {
        return 1000.00;
    }

    public function __toString()
    {
        return $this->value().' cents';
    }
}