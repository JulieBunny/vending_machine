<?php

namespace Machine\Fund;


interface Fund
{
    /**
     * @return float
     */
	public function value(): float;

	public function __toString();
}