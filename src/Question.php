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

class Question
{
    
    use ThingTrait;

    /**
     * A list of answers to this question.
     * @var \Quizzes\AnswerList
     */
    protected $answers;

    public function __construct($name, $description, $alias)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setAlias($alias);
    }

    /**
     * Gets the list of answers to this question.
     *
     * @return \Quizzes\AnswerList
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Sets the list of answers to this question.
     *
     * @param \Quizzes\AnswerList $answers the answers
     *
     * @return self
     */
    protected function setAnswers(\Quizzes\AnswerList $answers)
    {
        $this->answers = $answers;

        return $this;
    }
}
