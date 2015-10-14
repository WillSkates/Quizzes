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

use Quizzes\Question;

use PHPUnit_Framework_TestCase;

class QuestionTests extends PHPUnit_Framework_TestCase
{

	public function testCanStoreInformation()
	{

		$name = 'a name';
		$description = 'a description';
		$alias = 'an-alias';
		
		$question = new Question($name, $description, $alias);

		$this->assertEquals($name, $question->getName());
		$this->assertEquals($description, $question->getDescription());
		$this->assertEquals($alias, $question->getAlias());
	}

}
