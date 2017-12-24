<?php

namespace Deltatag\Enum;

/**
 * Interface IEnum
 * 
 * @package Deltatag\Enum
 */
interface IEnum {
	public function getValue();
	public static function getDefault();
}