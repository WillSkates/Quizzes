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
use Quizzes\AnswerList;

use PHPUnit_Framework_TestCase;

class AnswerListTests extends PHPUnit_Framework_TestCase
{

	public function testWillStoreAnswer()
	{

		$name = 'a name';
		$description = 'a description';
		$alias = 'an-alias';
		
		$answer = new Answer($name, $description, $alias);

		$answerList = new AnswerList();
		$answerList->push($answer);

		$this->assertCount(1, $answerList);

		$answerList->remove($answer);

		$this->assertCount(0, $answerList);

	}

	public function testWontStoreNormalObject()
	{
		$this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
		$answerList = new AnswerList();
		$answerList->push(new \stdClass);
	}

	public function testWontStoreInteger()
	{
		$this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
		$answerList = new AnswerList();
		$answerList->push(1);
	}

	public function testWontStoreBoolean()
	{
		$this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
		$answerList = new AnswerList();
		$answerList->push(true);
	}
	
	/**
	 * @expectedException TypeError
	 */
	public function testWontStoreString()
	{
		$this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
		$answerList = new AnswerList();
		$answerList->push("This shouldn't work.");
	}

}
