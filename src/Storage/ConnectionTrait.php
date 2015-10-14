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
use Doctrine\ORM\Tools\SchemaTool;

use Quizzes\Quiz as BaseQuiz;
use Quizzes\Storage\ORM\Quiz;

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
            __DIR__ . '/ORM/Config'
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

    {
        $tool = new SchemaTool($this->entityManager);
        $classes = array(
            $this->entityManager->getClassMetadata('Quizzes\Storage\ORM\Quiz'),
            $this->entityManager->getClassMetadata('Quizzes\Storage\ORM\Question'),
            $this->entityManager->getClassMetadata('Quizzes\Storage\ORM\Answer')
        );
        $schema = $tool->getCreateSchemaSql($classes);
        return $schema;
    }
    
    public function findAllQuizzes()
    {

        $res = [];

        $list = $this->entityManager->getRepository('Quizzes\Storage\ORM\Quiz')->findAll();

        foreach ($list as $entity) {
            $quiz = new BaseQuiz(
                $entity->getName(),
                $entity->getDescription(),
                $entity->getAlias()
            );

            $quiz->setUuid($entity->getUuid());
            $quiz->setUrl($entity->getUrl());

            $res[] = $quiz;
        }

        return $res;

    }

    public function saveQuiz(BaseQuiz $quiz)
    {
        $entity = new Quiz();
        $entity->setName($quiz->getName());
        $entity->setDescription($quiz->getDescription());
        $entity->setAlias($quiz->getAlias());
        $entity->setUuid($quiz->getUuid());
        $entity->setUrl($quiz->getUrl());
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }
}
