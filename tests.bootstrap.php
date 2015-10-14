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

$conn = new PDO(
	'mysql:host=localhost;dbname=quizzes_tests',
	'travis',
	'',
	[
    	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	]
);

$mysql = new Mysql(
	'localhost',
	'travis',
	'',
	'quizzes_tests'
);

$sql = $mysql->provideSchemaSql();

foreach ($sql as $query) {
	$conn->exec($query);
}
