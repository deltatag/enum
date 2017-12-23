<?php

namespace Deltatag\Enum\Tests;

/**
 * Class EnumTestClass
 *
 * @package Deltatag\Enum\Tests
 */
class DefaultEnumClass extends NoDefaultEnumClass
{
	// Default value
	const __default = self::ONE;
}