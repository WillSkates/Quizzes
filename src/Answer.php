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

    /**
     * The question that this is an answer to.
     * @var \Quizzes\Question
     */
    protected $question;

    public function __construct($name, $description, $alias)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setAlias($alias);
    }

    /**
     * Gets the question that this is an answer to.
     *
     * @return \Quizzes\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Sets the question that this is an answer to.
     *
     * @param \Quizzes\Question $question the question
     *
     * @return self
     */
    public function setQuestion(\Quizzes\Question $question)
    {
        $this->question = $question;

        return $this;
    }
}
