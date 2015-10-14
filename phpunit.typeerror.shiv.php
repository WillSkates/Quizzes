<?php
/**
 * This is a little piece of code that enables me to tell
 * which exception gets thrown when a type error occurs whilst running a test in PHPUnit.
 *
 * PHP 7 will use the TypeErrorException PHP 5 will not.
 */
if(class_exists('TypeError')) {
	define('TYPE_ERROR_EXCEPTION_NAME', 'TypeError');
} else {
	define('TYPE_ERROR_EXCEPTION_NAME', 'PHPUnit_Framework_Error');
}