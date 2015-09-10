<?php

namespace config;

use PDO;

class DBConfig 
{
	public $db_host;
	public $db_name;
	public $db_charset;
	public $db_user;
	public $db_password;
	public $dsn;

	public function __construct()
	{
		$this->db_host = "localhost";
		$this->db_name = "php_pure_registration_db";
		$this->db_charset = "utf8";
		$this->db_user = "root";
		$this->db_password = "";

		$this->dsn = "mysql:host=$this->db_host; dbname=$this->db_name; charset=$this->db_charset;";

		$this->opt = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		];
	}
}