<?php 

spl_autoload_extensions(".php"); // comma-separated list
spl_autoload_register();

use models\User as User;

$user = new User();

if ( !$user->fromSession() )
{
	header("Location: signup.php");
	die();
}

include('public\profile.html');