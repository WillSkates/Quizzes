<?php
require __DIR__ . '/vendor/autoload.php';

//create the mysql database to use.
$conn = new PDO(
	'mysql:host=' . $_ENV['db_host'] . ';',
	$_ENV['db_user'],
	$_ENV['db_pass'],
	[
    	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	]
);

$conn->exec('CREATE DATABASE ' . $_ENV['db_name'] . ';');