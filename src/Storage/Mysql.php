<?php
/*
 * This file is part of Quizzes
 *
 * (c) William Skates <will@stuffby.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Quizzes\Storage;

class Mysql
{

    use ConnectionTrait;

    public function __construct($host, $username, $password, $dbname)
    {

        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'host'     => $host,
            'user'     => $username,
            'password' => $password,
            'dbname'   => $dbname
        );

        $this->establishConnection($dbParams);

    }
}
