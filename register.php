<?php

include('User.php');
include('UserMapper.php');
include('DBConnection.php');

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
	$redirectUrl = "signup.php";
}
header("Location: $redirectUrl");
die(); 