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


    protected function useConnectionToTestCrud($connection)
    {

        $quiz = [
            'name' => 'The first Quiz',
            'description' => 'A data sample to test crud operations.',
            'alias' => 'the-first-quiz',
            'uuid' => '',
            'url' => '/quizzes/1',
            'questions' => [
                [
                    'name' => 'A sample question',
                    'description' => 'What is this?',
                    'alias' => 'a-sample-question',
                    'uuid' => '',
                    'url' => '/quizzes/1/questions/1',
                    'answers' => [
                        [
                            'name' => 'Something',
                            'description' => '',
                            'alias' => '',
                            'uuid' => '',
                            'url' => '/quizzes/1/questions/1/answers/1'
                        ],
                        [
                            'name' => 'Nothing',
                            'description' => '',
                            'alias' => '',
                            'uuid' => '',
                            'url' => '/quizzes/1/questions/1/answers/2'
                        ]
                    ]
                ],
                [
                    'name' => 'Another sample question',
                    'description' => 'How does this work?',
                    'alias' => 'how-does-this-work',
                    'uuid' => '',
                    'url' => '/quizzes/1/questions/2',
                    'answers' => [
                        [
                            'name' => 'I have no idea.',
                            'description' => '',
                            'alias' => '',
                            'uuid' => '',
                            'url' => '/quizzes/1/questions/2/answers/1'
                        ]
                    ]
                ]
            ]
        ];

        //build the quiz object from the data.
        $obj = new Quiz($quiz['name'], $quiz['description'], $quiz['alias']);
        $obj->setUrl($quiz['url']);

        foreach ($quiz['questions'] as $question) {
            $q = new Question($question['name'], $question['description'], $question['alias']);
            $q->setUrl($question['url']);
            $q->setQuiz($obj);
            $obj->getQuestions()->add($q);

            foreach ($question['answers'] as $answer) {
                $a = new Answer($answer['name'], $answer['description'], $answer['alias']);
                $a->setUrl($answer['url']);
                $a->setQuestion($q);
                $q->getAnswers()->add($a);
            }
        }

        $this->assertCount(0, $connection->getQuizzes()->findAll());

        $connection->persist($obj);

        $this->assertCount(1, $connection->getQuizzes()->findAll());

        $quizzes = $connection->getQuizzes()->findAll();

        $result = $quizzes[0];

        $uuid = $quizzes->getUuid();

    }

    protected function doesInfoMatchQuiz(array $info, Quiz $quiz)
    {

        $this->assertEquals($info['name'], $quiz->getName());
        $this->assertEquals($info['description'], $quiz->getDescription());
        $this->assertEquals($info['alias'], $quiz->getAlias());
        $this->assertEquals($info['url'], $quiz->getUrl());

        $this->assertEquals(count($info['questions']), count($quiz->getQuestions()));

        $found = 0;

        foreach ($info['questions'] as $k => $v) {
            $foundAnswers = 0;

            foreach ($quiz->getQuestions() as $question) {
                if(
                    $v['name'] == $question->getName()
                    && $v['description'] == $question->getDescription()
                    && $v['alias'] == $question->getAlias()
                    && $v['url'] == $question->getUrl()
                ) {
                    $found++;
                    $foundAnswers = 0;

                    foreach ($v['answers'] as $value) {

                        foreach($question->getAnswers() as $answer) {

                            if ($value['name'] == $answer->getName()
                                && $value['description'] == $answer->getDescription()
                                && $value['alias'] == $answer->getAlias()
                                && $value['url'] == $answer->getUrl()
                            ) {
                                $foundAnswers++;
                            }

                        }

                    }

                    $this->assertEquals(
                        count($v['answers']),
                        $foundAnswers,
                        print_r(
                            [
                                "info" => $v['answers'],
                                "actual" => $question->getAnswers()
                            ],
                            true
                        )
                    );
                }

            }

        }

        $this->assertEquals(
            count($info['questions']),
            $found,
            print_r(
                [
                    "info" => $info['questions'],
                    "actual" => $question->getQuestions()
                ]
            )
        );

    }

    protected function createMysqlConnection()
    {
        $connection = $this->getObjectForTrait('Quizzes\Storage\ConnectionTrait');
        $connection->establishConnection(
            'pdo_mysql',
            $_ENV['db_host'],
            $_ENV['db_username'],
            $_ENV['db_password'],
            $_ENV['db_name']
        );
        return $connection;
    }

    public function testCrudUsingMysqlConnection()
    {
        $connection = $this->createMysqlConnection();
        $this->useConnectionToTestCrud($connection);
    }

    public function testGetMetadata()
    {

        //Make sure that we have metadata for each class.
        $connection = $this->createMysqlConnection();
        $metadata = $connection->getClassMetadata();

        $classes = [
            "\Quizzes\Quiz",
            "\Quizzes\Question",
            "\Quizzes\Answer"
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

        $this->assertCount(0, $class, print_r($names, true));

    }

    public function testGetSchemaTool()
    {
        $connection = $this->createMysqlConnection();
        $schema = $connection->getSchemaTool();
        $this->assertInstanceOf('Doctrine\ORM\Tools\SchemaTool', $schema);
    }
}
