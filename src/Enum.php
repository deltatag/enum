<?php

namespace Deltatag\Enum;

use Deltatag\Enum\Exceptions\EnumDefaultNotDefinedException;
use Deltatag\Enum\Exceptions\EnumValueNotAllowedException;

/**
 * Class EnumBaseClass
 *
 * @package Deltatag\Enum
 */
abstract class Enum
{
	use ConstantsTrait;

	private $value = null;

	/**
	 * EnumBaseClass constructor. Set to private to prevent instantiation
	 *
	 * @param mixed $value
	 * @throws EnumValueNotAllowedException
	 */
	public function __construct($value) {
		if(!self::isValid($value)) {
			throw new EnumValueNotAllowedException();
		}
		$this->value = $value;
	}

	/**
	 * Fetch default value of enum
	 *
	 * @return mixed
	 * @throws EnumDefaultNotDefinedException
	 */
	public static function getDefault()
	{
		if(array_key_exists('__default', self::getConstants())) {
			return self::getConstants()['__default'];
		}
		throw new EnumDefaultNotDefinedException();
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return strval($this->value);
	}
}