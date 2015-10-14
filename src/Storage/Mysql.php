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

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Mysql
{

    public function __construct($host, $username, $password, $dbname)
    {

        $paths = [
            __DIR__ . '/ORM/entities.xml'
        ];

        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'host'     => $host,
            'user'     => $username,
            'password' => $password,
            'dbname'   => $dbname
        );

        $isDevMode = false;

        $config = Setup::createXMLMetadataConfiguration($paths, $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);

    }
}
