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

use SplObjectStorage;

use BadMethodCallException;

class AnswerList extends SplObjectStorage
{
    
    public function attach($obj, $inf = null)
    {
        throw new BadMethodCallException(
            "The ::attach method from SplObjectStorage cannot be used to store Answers."
        );
    }

    public function detach($obj)
    {
        throw new BadMethodCallException(
            "The ::detach method from SplObjectStorage cannot be used to store Answers."
        );
    }

    public function push(Answer $answer)
    {
        parent::attach($answer);
    }

    public function remove(Answer $answer)
    {
        parent::detach($answer);
    }

}
