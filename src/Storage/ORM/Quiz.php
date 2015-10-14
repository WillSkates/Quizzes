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

use Doctrine\Common\Collections\ArrayCollection;
use Quizzes\ThingTrait;

class Quiz
{

    use ThingTrait;

    /**
     * A list of questions in this quiz.
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }
}
