<?php

require 'models/userClass.php';
session_start();

$user=new UserClass();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$email=htmlspecialchars($_POST['email']);
		$pass=htmlspecialchars($_POST['password']);

		if($user->userIsvalid($email,$pass))
		{
			$_SESSION['userName']=$email;
			$userID=$user->getUserId($email);
			$_SESSION['userID']=$userID;
			$_SESSION['userCat']=$user->getUsercategory($userID);
			header("Location: home.php");
		}
		else
		{
			header("Location: login.php");
			die(1);
		}
	}
}
require 'views/login.view.php';
?>