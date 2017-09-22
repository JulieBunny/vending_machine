<?php

namespace Cash;


interface CashInterface
{

    public function __construct($value);

    public function getValue();

}