<?php

namespace Deltatag\Enum\Tests;

use Deltatag\Enum\Exceptions\EnumDefaultNotDefinedException;

/**
 * Class EnumTest
 *
 * @package Deltatag\Enum\Tests
 */
class EnumTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Test constructor
	 */
	public function testConstruct()
	{
		$enum = new DefaultEnumClass(DefaultEnumClass::ONE);

		$this->assertSame(DefaultEnumClass::class, get_class($enum));

		$this->assertSame('1', $enum->__toString());

		try {
			new DefaultEnumClass(DefaultEnumClass::getDefault());
		} catch (\Exception $e) {
			$this->assertTrue(false, 'Construct with default should not fail');
		}
	}

	/**
	 * Test getConstants method
	 */
	public function testGetConstants()
	{
		$this->assertSame(4, count(DefaultEnumClass::getConstants()));

		$this->assertSame([
			'__default' => '1',
			'ONE' => '1',
			'TWO' => '2',
			'THREE' => '3'
		], DefaultEnumClass::getConstants());
	}

	/**
	 * Test getDefault method
	 *
	 * @throws EnumDefaultNotDefinedException
	 */
	public function testGetDefault()
	{
		try {
			$this->assertSame(DefaultEnumClass::getDefault(), DefaultEnumClass::__default);
		} catch (\Exception $e) {
			$this->assertTrue(false, 'Enum getDefault method should not throw exception when default defined');
		}

		$this->expectException(EnumDefaultNotDefinedException::class);
		/** @noinspection PhpUnhandledExceptionInspection */
		NoDefaultEnumClass::getDefault();

	}

	/**
	 * Test isValid method
	 */
	public function testIsValid()
	{
		$this->assertTrue(DefaultEnumClass::isValid(DefaultEnumClass::ONE));
		$this->assertTrue(DefaultEnumClass::isValid('1'));
		$this->assertFalse(DefaultEnumClass::isValid('4'));
	}
}