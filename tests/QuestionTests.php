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
    }
}
