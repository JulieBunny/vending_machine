<?php

namespace VendingMachine\Item;

class ItemDefinition
{
    private $id;
    private $name;
    private $price;

    public function __construct($id, $price, $name = '')
    {
    		$this->id = $id;
				$this->price = $price;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
    		return $this->name = '' ? $this->id : $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

}