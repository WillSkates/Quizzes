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
		$quizList->push($quiz);

		$this->assertCount(1, $quizList);

		$quizList->remove($quiz);

		$this->assertCount(0, $quizList);

	}

	/**
	 * @expectedException TypeError
	 */
	public function testWontStoreNormalObject()
	{
		$quizList = new QuizList();
		$quizList->push(new \stdClass);
	}

	/**
	 * @expectedException TypeError
	 */
	public function testWontStoreInteger()
	{
		$quizList = new QuizList();
		$quizList->push(1);
	}

	/**
	 * @expectedException TypeError
	 */
	public function testWontStoreBoolean()
	{
		$quizList = new QuizList();
		$quizList->push(true);
	}

	/**
	 * @expectedException TypeError
	 */
	public function testWontStoreString()
	{
		$quizList = new QuizList();
		$quizList->push("This shouldn't work.");
	}

}
