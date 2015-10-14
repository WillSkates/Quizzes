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
use Quizzes\QuizList;

use PHPUnit_Framework_TestCase;

class QuizListTests extends PHPUnit_Framework_TestCase
{

	public function testWillStoreQuiz()
	{

		$name = 'a name';
		$description = 'a description';
		$alias = 'an-alias';
		
		$quiz = new Quiz($name, $description, $alias);

		$quizList = new QuizList();
		$quizList->attach($quiz);

	}

	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreNormalObject()
	{
		$quizList = new QuizList();
		$quizList->attach(new \stdClass);
	}

	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreInteger()
	{
		$quizList = new QuizList();
		$quizList->attach(1);
	}

	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreBoolean()
	{
		$quizList = new QuizList();
		$quizList->attach(true);
	}
	
	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testWontStoreString()
	{
		$quizList = new QuizList();
		$quizList->attach("This shouldn't work.");
	}

}