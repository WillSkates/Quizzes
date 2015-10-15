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

use Doctrine\Common\Collections\ArrayCollection;

class Quiz
{

    use ThingTrait;

    /**
     * A list of questions in this quiz.
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $questions;

    public function __construct($name, $description, $alias)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setAlias($alias);
        $this->questions = new ArrayCollection();
    }

    /**
     * Gets the list of questions in this quiz.
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Sets the list of questions in this quiz.
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $questions the questions
     *
     * @return self
     */
    protected function setQuestions(ArrayCollection $questions)
    {
        $this->questions = $questions;

        return $this;
    }
}
