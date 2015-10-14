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

class QuizList extends SplObjectStorage
{
	
	public function attach(Quiz $quiz, $data = NULL)
    {
        parent::attach($quiz);
    }

    public function detach(Quiz $quiz)
    {
        parent::detach($quiz);
    }

}
