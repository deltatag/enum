# Enumerations for PHP

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/deltatag/enum/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/deltatag/enum/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/deltatag/enum.svg?style=flat-square)](https://packagist.org/packages/deltatag/enum)
[![Build Status](https://scrutinizer-ci.com/g/deltatag/enum/badges/build.png?b=master)](https://scrutinizer-ci.com/g/deltatag/enum/build-status/master)
[![Latest stable version](https://img.shields.io/packagist/v/deltatag/enum.svg?style=flat-square)](https://packagist.org/packages/deltatag/enum)
[![License](http://img.shields.io/github/license/deltatag/enum.svg?style=flat-square)](https://packagist.org/packages/deltatag/enum)

The enumeration package provides easy usage of enumerations.

The enum features are similar to ``SplEnum``, but without installation of an additional PHP package. It provides convenient features to speed up the implementation enumerations to your application.

## Installation

```
composer require deltatag/enum
```

#### Object methods:

* ``__construct()`` The constructor check if given value is in the enumeration or simply use defined default value. If value not allowed a **EnumValueNotAllowedException** will be thrown.
* ``__toString()`` You can directly output the enum object or check against value
* ``getValue()`` Get the current value of the enum object
* ``isEqual()`` Compare one instance of enum to another

#### Static methods:

* ``getConstants()`` Returns all possible values for enumeration with constant name as key
* ``getDefault()`` Get default enum value is set. Constant key must be **__default**. If no default value was defined a **EnumDefaultValueNotDefinedException** will be thrown.
* ``toArray()`` Wrapper for method getConstants()
* ``isValid()`` Check if value is valid enum value

For general constant methods you can use the ``ConstantsTrait``.

## Usage

Simply define an enum class of your need and use it for validation.

```php
// Create new enumeration class which extends Enum base class
class Fruits extends Deltatag\Enum\Enum
{
	// Default value
	const __default = self::APPLE;
	// Enumeration values
	const APPLE = '1';
	const ORANGE = '2';
	const PEAR = '3';
	const BANANA = '4';
}

// check for constant

Fruits::isValid(Fruits::BANANA); // returns true


// check for value

Fruits::isValid('1'); // returns true

Fruits::isValid('Potato') // returns false

// get all values of enumeration
$enumValues = Fruits::getConstants();
```

For object oriented usage you can also use the enum object itself for type-hinting.

```php
// use enumeration class
$apple = new Fruits(Fruits::APPLE);

function checkMyFruit(Fruits $fruit)
{
	if ($fruit == Fruits::APPLE) {
		echo "I'm an apple!";
	} else {
		echo "I'm no apple";
	}
}

checkMyFruit($apple); // will output "I'm an apple!"
```

When facing other values then strings for constants the comparison must change to the following.

```php
// use enumeration class
$apple = new Fruits(Fruits::APPLE);

function checkMyFruit(Fruits $fruit)
{
    // directly compare enumerations
	if (fruit == new Fruits(Fruits::APPLE)) {
		echo "I'm an apple!";
	} else {
		echo "I'm no apple";
	}
}
```

Contributing
------------

Dependencies are managed through composer:

```
$ composer install
```

Tests can then be run via phpunit:

```
$ vendor/bin/phpunit
```