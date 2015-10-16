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

use Quizzes\ThingTrait;

use PHPUnit_Framework_TestCase;

class ThingTraitTests extends PHPUnit_Framework_TestCase
{

    public function testCanUse()
    {
        $thing = $this->getObjectForTrait('Quizzes\ThingTrait');

        $this->assertNull($thing->getName());
        $this->assertNull($thing->getDescription());
        $this->assertNull($thing->getAlias());

        $name = 'a name';
        $description = 'a description';
        $alias = 'an-alias';
        $uuid = 'de305d54-75b4-431b-adb2-eb6b9e546014';
        $url = '/quizzes/1';

        $thing->setName($name);
        $thing->setDescription($description);
        $thing->setAlias($alias);
        $thing->setUuid($uuid);
        $thing->setUrl($url);

        $this->assertEquals($name, $thing->getName());
        $this->assertEquals($description, $thing->getDescription());
        $this->assertEquals($alias, $thing->getAlias());
        $this->assertEquals($uuid, $thing->getUuid());
        $this->assertEquals($url, $thing->getUrl());

        $name = 'another name';
        $description = 'another description';
        $alias = 'another-alias';
        $uuid = 'de305d54-75b4-431b-adb2-eb6b9e546015';
        $url = '/quizzes/2';

        $thing->setName($name);
        $thing->setDescription($description);
        $thing->setAlias($alias);
        $thing->setUuid($uuid);
        $thing->setUrl($url);

        $this->assertEquals($name, $thing->getName());
        $this->assertEquals($description, $thing->getDescription());
        $this->assertEquals($alias, $thing->getAlias());
        $this->assertEquals($uuid, $thing->getUuid());
        $this->assertEquals($url, $thing->getUrl());

    }
}
