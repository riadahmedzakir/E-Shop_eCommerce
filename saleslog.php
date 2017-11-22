<?php
session_start();

require 'models/orderClass.php';
$orderObj=new OrderClass(); 

if(!isset($_SESSION['userName']) && !($_SESSION['userCat']==1))
{
	header('Location:login.php');
	die(1);
}

if(isset($_GET['from']) && isset($_GET['to']))
{
	$from=$_GET['from'];
	$to=$_GET['to'];
	$reports=$orderObj->gerOrderDetails($to,$from);
}
require 'views/saleslog.view.php';
?>