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

class Quiz
{

    use ThingTrait;

    /**
     * A list of questions in this quiz.
     * @var \Quizzes\QuestionList
     */
    protected $questions;

    public function __construct($name, $description, $alias)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setAlias($alias);
    }

    /**
     * Gets the list of questions in this quiz.
     *
     * @return \Quizzes\QuestionList
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Sets the list of questions in this quiz.
     *
     * @param \Quizzes\QuestionList $questions the questions
     *
     * @return self
     */
    protected function setQuestions(\Quizzes\QuestionList $questions)
    {
        $this->questions = $questions;

        return $this;
    }
}