<?php

namespace Deltatag\Enum;

use Deltatag\Enum\Exceptions\EnumDefaultNotDefinedException;
use Deltatag\Enum\Exceptions\EnumValueNotAllowedException;

/**
 * Class EnumBaseClass
 *
 * @package Deltatag\Enum
 */
abstract class Enum implements IEnum
{
	use ConstantsTrait;

	/**
	 * @var mixed
	 */
	private $value;

	/**
	 * EnumBaseClass constructor.
	 *
	 * @param mixed $value If no value is defined the default value (if defined) will be used.
	 * @throws EnumDefaultNotDefinedException
	 * @throws EnumValueNotAllowedException
	 */
	public function __construct($value = null)
	{
		if (is_null($value)) {
			if(!array_key_exists('__default', self::getConstants())) {
				throw new EnumDefaultNotDefinedException();
			} else {
				$value = self::getConstants()['__default'];
			}
		}
		if (!self::isValid($value)) {
			throw new EnumValueNotAllowedException();
		}
		$this->value = $value;
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return strval($this->value);
	}

	/**
	 * Return current value
	 *
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * Fetch default value of enum
	 *
	 * @return mixed
	 * @throws EnumDefaultNotDefinedException
	 */
	public static function getDefault()
	{
		if (array_key_exists('__default', self::getConstants())) {
			return self::getConstants()['__default'];
		}
		throw new EnumDefaultNotDefinedException();
	}

	/**
	 * Compare instance of enum to another enum instance and comparing values
	 *
	 * @param IEnum $enumCompare
	 * @return bool
	 */
	public function isEqual(IEnum $enumCompare): bool
	{
		/** @noinspection PhpNonStrictObjectEqualityInspection */
		return $this == $enumCompare;
	}
}