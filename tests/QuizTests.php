<?php
/*
 * This file is part of Quizzes
 *
 * (c) William Skates <will@stuffby.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Quizzes\Tests;

use Quizzes\Quiz;

use PHPUnit_Framework_TestCase;

class QuizTests extends PHPUnit_Framework_TestCase
{

	public function testCanCreate()
	{
		$quiz = new Quiz();
	}

}