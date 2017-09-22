<?php

namespace Machine;


use Machine\Item\VendingItem;
use Machine\Item\VendingItemEnum;

class VendingItemCollection
{
    private $items;

    /**
     * VendingItemCollection constructor.
     *
     * @param $items
     */
    public function __construct($items = null)
    {
        if(empty($items)){
            $this->items = [
                VendingItemEnum::APPLE_JUICE => new VendingItem('Apple juice', 10.2),
                VendingItemEnum::ORANGE_JUICE => new VendingItem('Orange juice', 3.54),
            ];
        }
        else{
            $this->items = $items;
        }
    }


    public function itemByEnum($vendingItemEnum)
    {
        return $this->items[$vendingItemEnum];
    }
}