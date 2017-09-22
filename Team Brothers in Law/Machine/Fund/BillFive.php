<?php

namespace Machine\Fund;


class BillFive implements Fund
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
        return 500.00;
    }

    public function __toString()
    {
        return $this->value().' cents';
    }
}