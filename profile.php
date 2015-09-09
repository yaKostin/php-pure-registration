<?php 

include('User.php');

$user = new User();

if ( !$user->fromSession() )
{
	header("Location: signup.php");
	die();
}

include('profile.html');