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
use Quizzes\QuestionList;

use PHPUnit_Framework_TestCase;

class QuestionListTests extends PHPUnit_Framework_TestCase
{

	public function testWillStoreQuestion()
	{

		$name = 'a name';
		$description = 'a description';
		$alias = 'an-alias';
		
		$question = new Question($name, $description, $alias);

		$questionList = new QuestionList();
		$questionList->push($question);

		$this->assertCount(1, $questionList);

		$questionList->remove($question);

		$this->assertCount(0, $questionList);

	}

	public function testWontStoreNormalObject()
	{
		$this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
		$questionList = new QuestionList();
		$questionList->push(new \stdClass);
	}

	public function testWontStoreInteger()
	{
		$this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
		$questionList = new QuestionList();
		$questionList->push(1);
	}

	public function testWontStoreBoolean()
	{
		$this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
		$questionList = new QuestionList();
		$questionList->push(true);
	}
	
	public function testWontStoreString()
	{
		$this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
		$questionList = new QuestionList();
		$questionList->push("This shouldn't work.");
	}

}
