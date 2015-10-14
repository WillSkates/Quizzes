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

use PHPUnit_Framework_TestCase;

class MySQLTests extends PHPUnit_Framework_TestCase
{

    public function testCanCreateAndConnect()
    {
        $mysql = new Mysql(
            getenv('db_host'),
            getenv('db_username'),
            getenv('db_password'),
            getenv('db_name')
        );
    }
}
