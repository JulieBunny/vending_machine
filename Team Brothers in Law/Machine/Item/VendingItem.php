<?php

namespace Machine\Item;


class VendingItem
{
    private $name;
    private $price;

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return VendingItem
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function price()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     *
     * @return VendingItem
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }


    /**
     * VendingItem constructor.
     */
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

	function __toString()
	{
		return $this->name() . ' ' . $this->price() . '$';
	}
}