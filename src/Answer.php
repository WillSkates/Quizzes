<?php
/*
 * This file is part of Quizzes
 *
 * (c) William Skates <will@stuffby.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Quizzes;

class Answer
{
    
    use ThingTrait;

    public function __construct($name, $description, $alias)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setAlias($alias);
    }
}
