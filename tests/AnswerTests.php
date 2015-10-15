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

use PHPUnit_Framework_TestCase;

class AnswerTests extends PHPUnit_Framework_TestCase
{

    public function testCanStoreInformation()
    {

        $name = 'a name';
        $description = 'a description';
        $alias = 'an-alias';
        $uuid = 'de305d54-75b4-431b-adb2-eb6b9e546014';
        $url = '/quizzes/1/question/2/answer/1';
        
        $answer = new Answer($name, $description, $alias);

        $answer->setUuid($uuid);
        $answer->setUrl($url);

        $this->assertEquals($name, $answer->getName());
        $this->assertEquals($description, $answer->getDescription());
        $this->assertEquals($alias, $answer->getAlias());
        $this->assertEquals($uuid, $answer->getUuid());
        $this->assertEquals($url, $answer->getUrl());

    }
}
