<?php

require_once PATH . '/bower_components/medoo/medoo.php';

class Model extends medoo {
	
	protected $database_type = 'mysql';
	protected $charset = 'utf8';
	protected $database_name = DB_NAME;
	protected $server = DB_HOST;
	protected $username = DB_USER;
	protected $password = DB_PASSWORD;

}
