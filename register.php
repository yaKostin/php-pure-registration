<?php

include('User.php');
include('UserMapper.php');

$db_host = "localhost";
$db_name = "php_pure_registration_db";
$db_charset = "utf8";
$db_user = "root";
$db_password = "";
$dsn = "mysql:host=$db_host; dbname=$db_name; charset=$db_charset;";
$opt = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	];
$pdo = new PDO($dsn, $db_user, $db_password, $opt);

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
	$redirectUrl = "signup.php";
}
header("Location: $redirectUrl");
die(); 