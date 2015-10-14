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

use Quizzes\Quiz as BaseQuiz;
use Doctrine\Common\Collections\ArrayCollection;

class Quiz extends BaseQuiz
{

	public function __construct()
	{
		$this->questions = new ArrayCollection();
	}
}
