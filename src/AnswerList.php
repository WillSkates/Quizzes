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

class AnswerList extends SplObjectStorage
{
	
	public function attach(Answer $answer)
    {
        parent::attach($answer);
    }

    public function detach(Answer $answer)
    {
        parent::detach($answer);
    }

}
