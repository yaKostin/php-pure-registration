<?php 

namespace datamappers;

use PDO;
use models\User;

class UserMapper 
{
	protected $pdo;

	private $rules = [
		'minNameLength' => 2,
		'maxNameLength' => 64,
		'phonePattern' => "/\+380\([0-9]{2}\)[0-9]{3}-[0-9]{3}-[0-9]{2}/",
	];

	public function __construct(PDO $pdo) 
	{
		$this->pdo = $pdo;
	}

	public function save(User &$user)
	{
		if ( !$this->validate($user) ) 
		{
			return false;
		}
		
		$sql = "INSERT IGNORE INTO users (firstname, lastname, patronymic, email, phone, password_hash)
			values (:firstname, :lastname, :patronymic, :email, :phone, :password_hash)";
		$statement = $this->pdo->prepare($sql);

		$statement->bindParam("firstname", $user->firstname);
		$statement->bindParam("lastname", $user->lastname);
		$statement->bindParam("patronymic", $user->patronymic);
		$statement->bindParam("phone", $user->phone);
		$statement->bindParam("email", $user->email);
		$statement->bindParam("password_hash", $user->password_hash);

		$statement->execute();

		$user->id = $this->pdo->lastInsertId();
		return $user->id;
	}

	public function validate($user)
	{
		if (   strlen( $user->firstname ) < $this->rules['minNameLength'] 
			|| strlen( $user->firstname ) > $this->rules['maxNameLength'] )
		{
			return false;
		}

		if ( !filter_var( $user->email, FILTER_VALIDATE_EMAIL ) ) 
		{
			return false;
		}

		if ( !preg_match( $this->rules['phonePattern'], $user->phone ) )
		{
			return false;
		}

		return true;
	}
}