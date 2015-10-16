# Quizzes

A PHP library that implements functionality that's necessary to create multiple choice quizzes.

## Code Status

[![Build Status](https://secure.travis-ci.org/WillSkates/Quizzes.png?branch=master)](http://travis-ci.org/WillSkates/Quizzes)
[![Coverage Status](https://coveralls.io/repos/WillSkates/Quizzes/badge.svg?branch=master&service=github)](https://coveralls.io/github/WillSkates/Quizzes?branch=master)

## License

The license for this software is located in the project root in the file named LICENSE

## Requirements
- PHP 5.5 or newer

## Installing

You should use composer to install this library. 
Here is an example composer.json file:

```JSON
	{
	    "require": {
	        "willskates/quizzes": "v1.0.0"
	    }
	}
```

## Usage

### Brief summary.

This library provides you with a selection of classes. The main three are (including properties):

- Quiz
	1. **name** - The name of the quiz.
	2. **description** - A description for the quiz.
	3. **alias** - An alternative name for the quiz.
	4. **uuid** - A universally unique identifier for this quiz.
	5. **url** - A url where this quiz can be viewed.
	6. **questions** - A list of questions that belong to this quiz.
- Question
	1. **name** - The name of the question.
	2. **description** - A description for the question.
	3. **alias** - An alternative name for the question.
	4. **uuid** - A universally unique identifier for this question.
	5. **url** - A url where this question can be viewed.
	6. **quiz** - The quiz to which this question belongs.
	7. **answers** - A list of answers to this question.
- Answer
	1. **name** - The name of the answer.
	2. **description** - A description for the answer.
	3. **alias** - An alternative name for the answer.
	4. **uuid** - A universally unique identifier for this answer.
	5. **url** - A url where this item can be viewed.
	6. **question** - The question to which this answer belongs.

Most of these properties can be accessed using getters and setters e.g. 'name' can be accessed by using $obj->getName().

### Using all of the objects together.

```php
<?php
	
	use Quizzes\Quiz;
	use Quizzes\Question;
	use Quizzes\Answer;

	$quiz = new Quiz('A name', 'A description', 'An alias');

	//Lets create a question.
	$question = new Question('What is the meaning of life?', '42', 'The ultimate question');

	$quiz->getQuestions()->add($question);
	$question->setQuiz($quiz);

	//Lets create some answers
	$answers = [
		new Answer('42', 'A number that we aren\'t really sure about.', ''),
		new Answer('43', 'Another number that we aren\'t really sure about.', ''),
		new Answer('44', 'Yet another number that we aren\'t really sure about.', '')
	];

	foreach($answers as $answer) {
		$answer->setQuestion($question);
		$question->getAnswers()->add($answer);
	}

?>
```

### Storing and persisting these objects.

We also have a selection of classes that can store this information.

At the moment this library supports the following databases out of the box:
- Mysql

### Mysql storage example.

```php
<?php

	use Quizzes\Storage\Mysql;

	$connection = new Mysql(
		'localhost',
		'username',
		'password',
		'databasename'
	);

?>
```

### Example storage options.

Now that you have a connection available you have access to storage repositories for Quizzes, Questions and Answers.

```php
<?php
	
	$connection->getQuizzes();
	$connection->getQuestions();
	$connection->getAnswers();

?>
```

All of these are instances of [http://www.doctrine-project.org/api/orm/2.2/class-Doctrine.ORM.EntityRepository.html#_find](\Doctrine\ORM\EntityRepository) and have access to it's methods. Here's a few examples of what you can do with it. (These can be used for questions, Quizzes and Answers).

```php
<?php
	
	$all = $connection->getQuizzes()->findAll();

	$list = $connection->getQuizzes()->findBy(["name" => "a name to search for"]);

	$single = $connection->getQuizzes()->findOneBy(["name" => "a name to search for"]);

?>
```

### Saving Objects.

Every connection has a persist() method that you can use to save objects. Note that identifiers and primary keys are stored in objects automatically.

```php
<?php
	
	use Quizzes\Quiz;
	use Quizzes\Question;
	use Quizzes\Answer;
	use Quizzes\Storage\Mysql;

	$connection = new Mysql(
		'localhost',
		'username',
		'password',
		'databasename'
	);

	$quiz = new Quiz('A name', 'A description', 'An alias');

	//Lets create a question.
	$question = new Question('What is the meaning of life?', '42', 'The ultimate question');

	$quiz->getQuestions()->add($question);
	$question->setQuiz($quiz);

	//Lets create some answers
	$answers = [
		new Answer('42', 'A number that we aren\'t really sure about.', ''),
		new Answer('43', 'Another number that we aren\'t really sure about.', ''),
		new Answer('44', 'Yet another number that we aren\'t really sure about.', '')
	];

	foreach($answers as $answer) {
		$answer->setQuestion($question);
		$question->getAnswers()->add($answer);
	}

	$connection->persist($quiz);

?>
```
