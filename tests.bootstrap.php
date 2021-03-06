<?php
require __DIR__ . '/vendor/autoload.php';

//create the mysql database to use.
$conn = new PDO(
	'mysql:host=localhost;',
	'travis',
	'',
	[
    	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	]
);

$conn->exec('CREATE DATABASE quizzes_tests;');


$cconn = new PDO(
	'mysql:host=localhost;dbname=quizzes_tests',
	'travis',
	'',
	[
    	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	]
);

$mysql = new Quizzes\Storage\Mysql(
	'localhost',
	'travis',
	'',
	'quizzes_tests'
);

$schema = $mysql->getSchemaTool();
$metadata = $mysql->getClassMetadata();

$sql = $schema->getCreateSchemaSql($metadata);

foreach ($sql as $query) {
	$cconn->exec($query);
}
