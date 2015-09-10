<?php

spl_autoload_extensions(".php");
spl_autoload_register();

use \models\User;
use \datamappers\UserMapper;
use \db\DBConnection;

$pdo = DBConnection::get();

$user = new User();
$user->firstname = $_POST['firstname'];
$user->lastname = $_POST['lastname'];
$user->patronymic = $_POST['patronymic'];
$user->email = $_POST['email'];
$user->password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
$user->phone = $_POST['phone'];

$userMapper = new UserMapper($pdo);

if ( $userMapper->save($user) )
{
	$user->saveInSession();
	$redirectUrl = 'profile.php';
}
else 
{
	$redirectUrl = "public\signup.html";
}
header("Location: $redirectUrl");
die(); 