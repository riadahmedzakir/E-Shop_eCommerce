<?php

require_once 'model.php';

class OrderClass  extends Model
{
	//Constructor calls Base-Class constructor. 
	function __construct()
	{
		parent::__construct();
	}

	public function createNewOrder($userId,$address,$placementTime)
	{
		//INSERT INTO `tbl_order` (`id`, `userId`, `placementTime`, `address`) VALUES (NULL, '', '', '', '');
		try
		{
			$stmt=$this->db->prepare("INSERT INTO `tbl_order` (`id`, `userId`, `placementTime`, `address`) VALUES (NULL, :userId, :placementTime, :address);");
			$stmt->bindparam(':userId',$userId);
			$stmt->bindparam(':placementTime',$placementTime);
			$stmt->bindparam(':address',$address);
			$stmt->execute();
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}
	}

	public function getLastOrderID()
	{
		try
		{
			$stmt=$this->db->prepare("SELECT MAX(id) id FROM tbl_order");
			$stmt->execute();
		 	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetch();
		 	return (int)$result['id'];
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}
	}

	public function addProductToOrder($orderId,$productId,$price,$unit)
	{
		try
		{
			$stmt=$this->db->prepare("INSERT INTO `tbl_orderedproduct` (`id`, `productId`, `price`, `unit`, `orderId`) VALUES (NULL, :productId, :price, :unit, :orderId);");
			$stmt->bindparam(':productId',$productId);
			$stmt->bindparam(':price',$price);
			$stmt->bindparam(':unit',$unit);
			$stmt->bindparam(':orderId',$orderId);
			$stmt->execute();
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}		
	}

	public function getUserOrders($userId)
	{
		try
		{
			$stmt=$this->db->prepare("SELECT * FROM tbl_order WHERE userId=:userId");
			$stmt->bindparam(':userId',$userId);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}
	}

	public function getOrderedProducts($orderId)
	{
		try
		{
			$stmt=$this->db->prepare("SELECT name, unit, tbl_product.price FROM tbl_orderedproduct,tbl_product WHERE tbl_orderedproduct.productId=tbl_product.id AND orderId=:orderId");
			$stmt->bindparam(':orderId',$orderId);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}
	}

	public function getAllOrder()
	{
		try
		{
			$stmt=$this->db->prepare("SELECT * FROM tbl_order");
			$stmt->bindparam(':userId',$userId);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}
	}

	public function getNotDeliveredOrders()
	{
		try
		{
			$stmt=$this->db->prepare("SELECT * FROM tbl_order WHERE status=0");
			$stmt->bindparam(':userId',$userId);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}
	}

	public function changeOrderStatus($orderId,$status)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE `tbl_order` SET `status` = :status WHERE `tbl_order`.`id` = :id;");
			$stmt->bindparam(':id',$orderId);
			$stmt->bindparam(':status',$status);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}
	}


	public function gerOrderDetails($toTime,$fromTime)
	{
		try
		{
			$stmt=$this->db->prepare("SELECT tbl_order.id id, address, placementTime, (SELECT SUM(tbl_orderedproduct.price) FROM tbl_orderedproduct WHERE tbl_orderedproduct.orderId=tbl_order.id) as price, status FROM tbl_orderedproduct, tbl_order WHERE tbl_orderedproduct.orderId=tbl_order.id AND placementTime between :from AND :to;");
			$stmt->bindparam(':from',$fromTime);
			$stmt->bindparam(':to',$toTime);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}
	}
}