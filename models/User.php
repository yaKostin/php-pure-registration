<?php

namespace models;

class User
{
	public $id;
	public $firstname;
	public $lastname;
	public $patronymic;
	public $phone;
	public $email;
	public $password_hash;

	public function saveInSession() 
	{
		session_start();
		foreach ($this as $key => $value) 
		{
			$_SESSION[$key] = $value;
		}
	}

	public function fromSession()
	{
		if ( !isset($_COOKIE['PHPSESSID']) )
		{
			return 0;
		}

		session_start();

		foreach ($this as $key => $value)
		{
			$this->$key = $_SESSION[$key];
		}

		return $this->id;
	}
}