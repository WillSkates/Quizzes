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

use Quizzes\Answer as BaseAnswer;

class Answer extends BaseAnswer
{

    /**
     * The question that this answer belongs to.
     * @var \Quizzes\Storage\ORM\Question
     */
    protected $question;

    public function __construct()
    {

    }

    /**
     * Gets the question that this answer belongs to.
     *
     * @return \Quizzes\Storage\ORM\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Sets the question that this answer belongs to.
     *
     * @param \Quizzes\Storage\ORM\Question $question the question
     *
     * @return self
     */
    public function setQuestion(\Quizzes\Storage\ORM\Question $question)
    {
        $this->question = $question;

        return $this;
    }
}
