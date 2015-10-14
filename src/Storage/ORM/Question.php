<?php
/*
 * This file is part of Quizzes
 *
 * (c) William Skates <will@stuffby.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Quizzes\Storage\ORM;

use Quizzes\Question as BaseQuestion;
use Doctrine\Common\Collections\ArrayCollection;

class Question extends BaseQuestion
{

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }
}
