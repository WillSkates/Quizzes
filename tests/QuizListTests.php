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

    public function testWontStoreNormalObject()
    {
        $this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
        $quizList = new QuizList();
        $quizList->push(new \stdClass);
    }

    public function testWontStoreInteger()
    {
        $this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
        $quizList = new QuizList();
        $quizList->push(1);
    }

    public function testWontStoreBoolean()
    {
        $this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
        $quizList = new QuizList();
        $quizList->push(true);
    }

    public function testWontStoreString()
    {
        $this->setExpectedException(TYPE_ERROR_EXCEPTION_NAME);
        $quizList = new QuizList();
        $quizList->push("This shouldn't work.");
    }

}
