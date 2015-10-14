<?php
$map = [
	
	'Quizzes\\Quiz' => "Quiz.php"

];

foreach ($map as $classfilepath) {
	require $classfilepath;
}