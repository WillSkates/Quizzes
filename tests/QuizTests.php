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

    public function testCanStoreInformation()
    {

        $name = 'a name';
        $description = 'a description';
        $alias = 'an-alias';
        $uuid = 'de305d54-75b4-431b-adb2-eb6b9e546014';
        $url = '/quizzes/1';
        
        $quiz = new Quiz($name, $description, $alias);

        $quiz->setUuid($uuid);
        $quiz->setUrl($url);

        $this->assertEquals($name, $quiz->getName());
        $this->assertEquals($description, $quiz->getDescription());
        $this->assertEquals($alias, $quiz->getAlias());
        $this->assertEquals($uuid, $quiz->getUuid());
        $this->assertEquals($url, $quiz->getUrl());

        $this->assertCount(0, $quiz->getQuestions());

        $questions = [
            new Question('a test question', '', ''),
            new Question('a test question 1', '', ''),
            new Question('a test question 2', '', '')
        ];

        foreach($questions as $question) {
            $question->setQuiz($quiz);
            $quiz->getQuestions()->add($question);
        }

        $this->assertCount(count($questions), $quiz->getQuestions());

        foreach($quiz->getQuestions() as $key => $value) {
            $this->assertEquals($questions[$key]->getName(), $value->getName());
        }

    }
}
