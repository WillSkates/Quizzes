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

class Question
{
    
    use ThingTrait;

    /**
     * A list of answers to this question.
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $answers;

    /**
     * The quiz that this question is a part of.
     * @var \Quizzes\Quiz
     */
    protected $quiz;

    public function __construct($name, $description, $alias)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setAlias($alias);
        $this->answers = new ArrayCollection();
    }

    /**
     * Gets the list of answers to this question.
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Gets the quiz that this question is a part of.
     *
     * @return \Quizzes\Quiz
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * Sets the quiz that this question is a part of.
     *
     * @param \Quizzes\Quiz $quiz the quiz
     *
     * @return self
     */
    public function setQuiz(\Quizzes\Quiz $quiz)
    {
        $this->quiz = $quiz;

        return $this;
    }
}
