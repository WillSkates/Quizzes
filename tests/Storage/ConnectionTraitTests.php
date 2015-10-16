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

use PHPUnit_Framework_TestCase;

use Quizzes\Quiz;
use Quizzes\Question;
use Quizzes\Answer;

class ConnectionTraitTests extends PHPUnit_Framework_TestCase
{

    protected function createMysqlConnection()
    {
        $connection = $this->getObjectForTrait('Quizzes\Storage\ConnectionTrait');
        $connection->establishConnection(
            [
                'driver'   => 'pdo_mysql',
                'host'     => $_ENV['db_host'],
                'username' => $_ENV['db_username'],
                'password' => $_ENV['db_password'],
                'dbname'   => $_ENV['db_name']
            ]
        );
        return $connection;
    }

    public function testGetMetadata()
    {

        //Make sure that we have metadata for each class.
        $connection = $this->createMysqlConnection();
        $metadata = $connection->getClassMetadata();

        $classes = [
            "Quizzes\Quiz",
            "Quizzes\Question",
            "Quizzes\Answer"
        ];

        $names = [];

        foreach ($metadata as $k => $v) {
            $names[] = $v->getName();

            foreach ($classes as $key => $value) {
                if ($value == $v->getName()) {
                    unset($classes[$key]);
                }
            }
        }

        $this->assertCount(0, $classes, print_r($names, true));

    }

    public function testGetRepositories()
    {
        $connection = $this->createMysqlConnection();
        $this->assertInstanceOf('Doctrine\ORM\EntityManager', $connection->getEntityManager());
        $this->assertInstanceOf('Doctrine\ORM\EntityRepository', $connection->getQuizzes());
        $this->assertInstanceOf('Doctrine\ORM\EntityRepository', $connection->getQuestions());
        $this->assertInstanceOf('Doctrine\ORM\EntityRepository', $connection->getAnswers());
    }

    public function testGetSchemaTool()
    {
        $connection = $this->createMysqlConnection();
        $schema = $connection->getSchemaTool();
        $this->assertInstanceOf('Doctrine\ORM\Tools\SchemaTool', $schema);
    }
}
