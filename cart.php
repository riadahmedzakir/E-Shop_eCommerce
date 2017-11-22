<?php
session_start();

require_once 'models/productClass.php';
require_once 'models/userClass.php';
require_once 'models/orderClass.php';

$proObj=new ProductClass();
$userObj=new UserClass();
$orderObj=new OrderClass();



if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	if(isset($_GET['id']))
	{
		if(!empty($_SESSION['items']))
		{
			$items=$_SESSION['items'];
		}
		else
		{
			//Assositive array as items[productID]=Quantity
			$items=array();
		}

		$unit=1;
		$id=$_GET['id'];
		$val=0;
		if(!empty($items[$id]))
		{
			$val=$items[$id];
		}		
		$items[$id]=$val+1;
		$_SESSION['items']=$items;

		//Counting number of items
		$counter=0;
		foreach ($items as $key => $value) 
		{
			$counter+=$value;
		}
		echo $counter." Item Added";
		die(1);
	}

	if(isset($_GET['getTotal']))
	{
		if(!empty($_SESSION['items']))
		{
			$items=$_SESSION['items'];
			//counting number of items
			$counter=0;
			foreach ($items as $key => $value) 
			{
				$counter+=$value;
			}
			echo $counter." Items Added";
			die(1);
		}
		else
		{
			echo "<span>0 Items</span>";
			die(1);
		}
	}

	if(isset($_GET['clearCart']))
	{
		unset($_SESSION['items']);
		header("Location:cart.php");
	}

	if(isset($_GET['cartConfirm']))
	{
		if(!isset($_SESSION['userID']))
		{
			header('Location: login.php');
			die(1);
		}
		$userID=$_SESSION['userID'];
		$userDetail=$userObj->getUserDetail($userID);
		//insert User Info to db
		$orderObj->createNewOrder($userID,$userDetail['address'],date("Y-m-d"));
		//getOrderID
		$orderId=$orderObj->getLastOrderID();
		//Insert Products to Database
		foreach ($_SESSION['items'] as $key => $value)
		{
			//get productDetails
			$product=$proObj->getProductDetail($key);
			//Key=productId, value=unit
			$orderObj->addProductToOrder($orderId,$key,$product['price'],$value); 
		}
		unset($_SESSION['items']);
		header('Location:home.php');
		die(1);
	}	
}
$cartItems=array();
if(isset($_SESSION['items']))
{
	foreach ($_SESSION['items'] as $key=>$value) 
	{ 
		//get Items
		$itemDetail=$proObj->getProductDetail($key);// store item data 
		$itemDetail['unit']=$value; //add unit amount to the itemDetail array
		$cartItems[]=$itemDetail; //add All details to cart
	}
}
require 'views/cart.view.php';
?>