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
	 * Helper for getConstants()
	 *
	 * @return array
	 */
	public static function toArray()
	{
		return self::getConstants();
	}

	/**
	 * Check if given value is valid value
	 *
	 * @param mixed $value
	 * @return bool
	 */
	public static function isValid($value)
	{
		return in_array($value, static::getConstants());
	}
}