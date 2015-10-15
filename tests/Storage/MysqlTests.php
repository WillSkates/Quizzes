<?php
/*
 * This file is part of Quizzes
 *
 * (c) William Skates <will@stuffby.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Quizzes\Tests;

use Quizzes\Storage\Mysql;
use Quizzes\Quiz;

use PHPUnit_Framework_TestCase;

class MySQLTests extends PHPUnit_Framework_TestCase
{

    public function testCanCreateAndConnect()
    {
        $mysql = new Mysql(
            $_ENV['db_host'],
            $_ENV['db_username'],
            $_ENV['db_password'],
            $_ENV['db_name']
        );
    }

    public function testCreateNewQuiz()
    {

        $mysql = new Mysql(
            $_ENV['db_host'],
            $_ENV['db_username'],
            $_ENV['db_password'],
            $_ENV['db_name']
        );

        $this->assertCount(0, $mysql->getQuizzes()->findAll());

        $name = 'a name';
        $description = 'a description';
        $alias = 'an-alias';
        
        $quiz = new Quiz($name, $description, $alias);

        $mysql->persist($quiz);

        $this->assertCount(1, $mysql->getQuizzes()->findAll());

    }
}
