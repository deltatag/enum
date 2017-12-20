# Enumerations for PHP

[![Total Downloads](https://img.shields.io/packagist/dt/deltatag/enum.svg?style=flat-square)](https://packagist.org/packages/sentry/sentry)
[![Downloads per month](https://img.shields.io/packagist/dm/deltatag/enum.svg?style=flat-square)](https://packagist.org/packages/sentry/sentry)
[![Issues open](https://img.shields.io/packagist/dt/deltatag/enum.svg?style=flat-square)](https://packagist.org/packages/sentry/sentry)
[![Latest stable version](https://img.shields.io/packagist/v/deltatag/enum.svg?style=flat-square)](https://packagist.org/packages/sentry/sentry)
[![License](http://img.shields.io/github/license/deltatag/enum.svg?style=flat-square)](https://packagist.org/packages/deltatag/enum)

The enumeration package provides easy usage of enumerations.

## Features

- `TODO`

## Usage

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