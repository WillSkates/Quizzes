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
     * Sets the list of answers to this question.
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $answers the answers
     *
     * @return self
     */
    protected function setAnswers(ArrayCollection $answers)
    {
        $this->answers = $answers;

        return $this;
    }
}
