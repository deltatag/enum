<?php

namespace Deltatag\Enum;

/**
 * Trait ConstantsTrait
 *
 * Provides constant features.
 *
 * @package Deltatag\Enum
 */
trait ConstantsTrait
{
	/**
	 * Fetch all constants of enum class
	 *
	 * @return array
	 */
	public static function getConstants()
	{
		return (new \ReflectionClass(static::class))->getConstants();
	}

	/**
	 * Check if given value is valid value
	 *
	 * @param mixed $value
	 * @return bool
	 */
	public static function isValid($value)
	{
		if (!in_array($value, static::getConstants())) {
			return false;
		}
		return true;
	}
}