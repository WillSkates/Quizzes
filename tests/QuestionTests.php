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
use Quizzes\Quiz;
use Quizzes\Answer;

use PHPUnit_Framework_TestCase;

class QuestionTests extends PHPUnit_Framework_TestCase
{

    public function testCanStoreInformation()
    {

        $name = 'a name';
        $description = 'a description';
        $alias = 'an-alias';
        $uuid = 'de305d54-75b4-431b-adb2-eb6b9e546014';
        $url = '/quizzes/1/question/2';

        $question = new Question($name, $description, $alias);

        $question->setUuid($uuid);
        $question->setUrl($url);

        $this->assertEquals($name, $question->getName());
        $this->assertEquals($description, $question->getDescription());
        $this->assertEquals($alias, $question->getAlias());
        $this->assertEquals($uuid, $question->getUuid());
        $this->assertEquals($url, $question->getUrl());

        $quiz = new Quiz('a test quiz', '', '');
        $this->assertNull($question->getQuiz());
        $question->setQuiz($quiz);
        $this->assertEquals($quiz->getName(), $question->getQuiz()->getName());

        $this->assertCount(0, $question->getAnswers());

        $answers = [
            new Answer('test answer', '', ''),
            new Answer('test answer 2', '', ''),
            new Answer('test answer 3', '', '')
        ];

        foreach($answers as $key => $value) {
            $answers[$key]->setQuestion($question);
            $question->getAnswers()->add($value);
        }

        $this->assertCount(count($answers), $question->getAnswers());

        foreach($question->getAnswers() as $key => $value) {
            $this->assertEquals($answers[$key]->getName(), $value->getName());
        }

    }
}
