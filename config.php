<?php
// If you installed via composer, just use this code to requrie autoloader on the top of your projects.
require_once 'bower_components/medoo/medoo.php';

$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'name',
	'server' => 'localhost',
	'username' => 'your_username',
	'password' => 'your_password',
	'charset' => 'utf8',
]);