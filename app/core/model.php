<?php

require_once PATH . '/bower_components/medoo/medoo.php';

class Model extends medoo {

	protected $db;

	function __construct() {
		$this->db = new Medoo(array(
			'database_type' => 'mysql',
			'database_name' => DB_NAME,
			'server' => DB_HOST,
			'username' => DB_USER,
			'password' => DB_PASSWORD,
			'charset' => DB_CHARSET
		));
	}

}
