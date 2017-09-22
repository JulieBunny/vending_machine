<?php

namespace Machine\Item;


class VendingItemEnum
{
	const ORANGE_JUICE = 'orange-juice';
	const APPLE_JUICE = 'apple-juice';

	public static function orangeJuice()
	{
		return self::ORANGE_JUICE;
	}

	public static function appleJuice()
	{
		return self::APPLE_JUICE;
	}
}