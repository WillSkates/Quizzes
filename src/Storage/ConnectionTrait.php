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

trait ConnectionTrait
{

    protected $entityManager;

    /**
     * Establish a connection to the database using the following:
     * @param  string $driver   The database driver name e.g.pdo_mysql
     * @param  string $host
     * @param  string $username
     * @param  string $password
     * @param  string $dbname
     * @return self
     */
    public function establishConnection($driver, $host, $username, $password, $dbname)
    {

        $paths = [
            __DIR__ . '/ORM/entities.xml'
        ];

        $dbParams = array(
            'driver'   => $driver,
            'host'     => $host,
            'user'     => $username,
            'password' => $password,
            'dbname'   => $dbname
        );

        $isDevMode = false;

        $config = Setup::createXMLMetadataConfiguration($paths, $isDevMode);
        $this->entityManager = EntityManager::create($dbParams, $config);

        return $this;

    }
}
