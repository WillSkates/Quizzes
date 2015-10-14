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

	public function testCanCreate()
	{
		$thing = $this->getObjectForTrait('Quizzes\ThingTrait');

		$this->assertNull($thing->getName());
		$this->assertNull($thing->getDescription());
		$this->assertNull($thing->getAlias());

		$name = 'a name';
		$description = 'a description';
		$alias = 'an-alias';

		$thing->setName($name);
		$thing->setDescription($description);
		$thing->setAlias($alias);

		$this->assertEquals($name, $thing->getName());
		$this->assertEquals($description, $thing->getDescription());
		$this->assertEquals($alias, $thing->getAlias());

		$name = 'another name';
		$description = 'another description';
		$alias = 'another-alias';

		$thing->setName($name);
		$thing->setDescription($description);
		$thing->setAlias($alias);

		$this->assertEquals($name, $thing->getName());
		$this->assertEquals($description, $thing->getDescription());
		$this->assertEquals($alias, $thing->getAlias());

	}

}
