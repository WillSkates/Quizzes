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

class QuestionList extends SplObjectStorage
{
	
	public function attach(Question $question)
    {
        parent::attach($question);
    }

    public function detach(Question $question)
    {
        parent::detach($question);
    }

}
