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

use Quizzes\Answer;

use PHPUnit_Framework_TestCase;

class AnswerTests extends PHPUnit_Framework_TestCase
{

	public function testCanStoreInformation()
	{

		$name = 'a name';
		$description = 'a description';
		$alias = 'an-alias';
		
		$answer = new Answer($name, $description, $alias);

		$this->assertEquals($name, $answer->getName());
		$this->assertEquals($description, $answer->getDescription());
		$this->assertEquals($alias, $answer->getAlias());
	}

}
