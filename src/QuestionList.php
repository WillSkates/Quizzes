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

class QuestionList extends SplObjectStorage
{

	public function attach($obj, $inf = null)
	{
		throw new BadMethodCallException(
			"The ::attach method from SplObjectStorage cannot be used to store Questions."
		);
	}
	
	public function push(Question $question)
    {
        parent::attach($question);
    }

    public function detach(Question $question)
    {
        parent::detach($question);
    }

}
