<?php

namespace Deltatag\Enum\Exceptions;

/**
 * Class EnumDefaultNotDefinedException
 *
 * @package Deltatag\Enum\Exceptions
 */
class EnumDefaultNotDefinedException extends \Exception
{
	protected $message = 'The default enum constant wasn\'t defined.';
}