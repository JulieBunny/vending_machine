<?php

namespace Machine\Item;


class VendingItem
{
    private $name;
    private $price;
    private $stock;

    /**
     * @return bool
     */
    public function hasStock() : bool
    {
        return $this->stock() > 0;
    }

    /**
     * @return int
     */
    public function stock()
    {
        return $this->stock;
    }

    /**
     *
     */
    public function addOneStock()
    {
        $this->addStock(1);
    }

    /**
     * @return bool
     */
    public function removeOneStock(): bool
    {
        return $this->removeStock(1);
    }

    /**
     * @param int $stock
     */
    public function addStock(int $stock)
    {
        $this->setStock($this->stock + $stock);
    }

    /**
     * @param int $stock
     *
     * @return bool
     */
    public function removeStock(int $stock): bool
    {
        $deducedStock = $this->stock - $stock;
        if ($deducedStock > 0) {
            $this->setStock($deducedStock);

            return true;
        }

        return false;
    }

    /**
     * @param mixed $stock
     */
    public function setStock(int $stock)
    {
        $this->stock = $stock;
    }

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
     *
     * @param string $name
     * @param float  $price
     * @param int    $stock
     */
    public function __construct(string $name, float $price, int $stock)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    function __toString()
    {
        return $this->name().' '.$this->price().'$';
    }
}