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

use Quizzes\Quiz;

trait ConnectionTrait
{

    /**
     * An object that assists us on performing operations
     * on entities.
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * An object that assists us on performing operations
     * on Quiz entities specifically.
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $quizzes;

    /**
     * An object that assists us on performing operations
     * on Question entities specifically.
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $questions;

    /**
     * An object that assists us on performing operations
     * on Answer entities specifically.
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $answers;

    /**
     * An object that helps us manage our database schema.
     * @var \Doctrine\ORM\Tools\SchemaTool
     */
    protected $schemaTool;

    /**
     * An array of objects containing metadata about our classes.
     * @var array
     */
    protected $classMetadata;

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

        $this->quizzes   = $this->entityManager->getRepository('Quizzes\Quiz');
        $this->questions = $this->entityManager->getRepository('Quizzes\Question');
        $this->answers   = $this->entityManager->getRepository('Quizzes\Answer');
        
        return $this;

    }

    /**
     * Use the entity manager to persist an object.
     * @param  mixed $obj The object to persist.
     * @return self
     */
    public function persist($obj)
    {
        $this->entityManager->persist($obj);
        $this->entityManager->flush();
        return $this;
    }

    /**
     * Gets the An object that assists us on performing operations
     * on entities.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * Gets the object that assists us on performing operations
     * on Quiz entities specifically.
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getQuizzes()
    {
        return $this->quizzes;
    }

    /**
     * Gets the object that assists us on performing operations
     * on Question entities specifically.
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Gets the An object that assists us on performing operations
     * on Answer entities specifically.
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Gets the object that helps us manage our database schema.
     *
     * @return \Doctrine\ORM\Tools\SchemaTool
     */
    public function getSchemaTool()
    {
        if (is_null($this->schemaTool)) {
            $this->schemaTool = new SchemaTool($this->entityManager);
        }
        return $this->schemaTool;
    }

    /**
     * Gets the array of objects containing metadata about our classes.
     *
     * @return array
     */
    public function getClassMetadata()
    {
        if (is_null($this->classMetadata)) {
            $this->classMetadata = array(
                $this->entityManager->getClassMetadata('Quizzes\Quiz'),
                $this->entityManager->getClassMetadata('Quizzes\Question'),
                $this->entityManager->getClassMetadata('Quizzes\Answer')
            );
        }
        return $this->classMetadata;
    }
}
