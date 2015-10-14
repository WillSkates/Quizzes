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

	}

	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreNormalObject()
	{
		$answerList = new AnswerList();
		$answerList->push(new \stdClass);
	}

	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreInteger()
	{
		$answerList = new AnswerList();
		$answerList->push(1);
	}

	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreBoolean()
	{
		$answerList = new AnswerList();
		$answerList->push(true);
	}
	
	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreString()
	{
		$answerList = new AnswerList();
		$answerList->push("This shouldn't work.");
	}

}
