<?php

namespace Machine\Fund;


use Machine\FundFactory;

class FundCollection
{
	/**
	 * @var Fund[]
	 */
	private $hashmap;

	/**
	 * FundCollection constructor.
	 * @param array $hashmap
	 */
	public function __construct(array $hashmap = [])
	{
		$this->hashmap = $hashmap;
	}

    /**
     * @param $fundTypeEnum
     *
     * @return FundCollection
     */
    public function fundByType($fundTypeEnum)
    {
        $funds = new FundCollection();
        $factory = new FundFactory();
        $fundToFetch = $factory->make($fundTypeEnum);

        foreach ($this->hashmap as $item) {
            if($item instanceof $fundToFetch)
                $funds->addFund($item);
        }

        return $funds;
	}

    public function addFund(Fund $fund)
    {
        return $this->hashmap[] =  $fund;
	}

    public function addFunds(FundCollection $funds)
    {
        $this->hashmap =  array_merge($this->hashmap, $funds->all());
    }

    /**
     *
     */
    public function clear()
    {
        $this->hashmap = [];
	}

	/**
	 * @return array[Fund]
	 */
	public function all()
	{
		return $this->hashmap;
	}

    /**
     * @return float
     */
    public function total()
    {
        $total = 0;
        foreach ($this->hashmap as $item) {
            $total += $item->value();
        }

        return $total;
	}

    public function totalByFundType($fundTypeEnum)
    {
        $total = 0;
        $factory = new FundFactory();
        $fundToFetch = $factory->make($fundTypeEnum);
        foreach ($this->hashmap as $item) {
            if($item instanceof $fundToFetch)
                $total += $item->value();
        }

        return $total;
    }
}