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

class Question
{

    use ThingTrait;

    /**
     * The reference to the quiz that this question is on.
     * @var \Quizzies\Storage\ORM\Quiz
     */
    protected $quiz;

    /**
     * A list of answers to this question.
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    /**
     * Gets the reference to the quiz that this question is on.
     *
     * @return \Quizzies\Storage\ORM\Quiz
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * Sets the reference to the quiz that this question is on.
     *
     * @param \Quizzies\Storage\ORM\Quiz $quiz the quiz
     *
     * @return self
     */
    public function setQuiz(\Quizzies\Storage\ORM\Quiz $quiz)
    {
        $this->quiz = $quiz;

        return $this;
    }
}
