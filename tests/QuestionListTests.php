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
		$questionList->attach($question);

	}

	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreNormalObject()
	{
		$questionList = new QuestionList();
		$questionList->attach(new \stdClass);
	}

	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreInteger()
	{
		$questionList = new QuestionList();
		$questionList->attach(1);
	}

	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreBoolean()
	{
		$questionList = new QuestionList();
		$questionList->attach(true);
	}
	
	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreString()
	{
		$questionList = new QuestionList();
		$questionList->attach("This shouldn't work.");
	}

}