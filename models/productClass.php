<?php
require_once 'model.php';

class ProductClass extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function addProduct($name,$descp,$price,$unit)
	{
		try
		{
			$stmt=$this->db->prepare("INSERT INTO `tbl_product` (`id`, `name`, `description`, `price`, `unitAvailable`) VALUES (NULL, :name, :descp, :price, :unit);");
			$stmt->bindparam(':name',$name);
			$stmt->bindparam(':descp',$descp);
			$stmt->bindparam(':price',$price);
			$stmt->bindparam(':unit',$unit);
			$stmt->execute();
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}
	}

	public function getLastProductId()
	{
		try
		{
			$stmt=$this->db->prepare("SELECT MAX(id) id FROM tbl_product");
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

	public function getAllProduct()
	{
		try
		{
			$stmt=$this->db->prepare("SELECT id, name, description, price, unitAvailable FROM tbl_product");
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

	public function getProductDetail($id)
	{
		try
		{
			$stmt=$this->db->prepare("SELECT * FROM tbl_product WHERE id=:id");
			$stmt->bindparam(':id',$id);
			$stmt->execute();
		 	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetch();
		 	return $result;
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}
	}

	public function updateProductDetail($id,$name,$descp,$price,$unit)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE tbl_product SET `name` = :name, `description` = :descp, `price` = :price, `unitAvailable` = :unit WHERE `id` = :id;");
			$stmt->bindparam(':id',$id);
			$stmt->bindparam(':name',$name);
			$stmt->bindparam(':descp',$descp);
			$stmt->bindparam(':price',$price);
			$stmt->bindparam(':unit',$unit);
			$stmt->execute();
		}
		catch(Exception $e0)
		{
		 	echo $e->getMessage();
		}
	}

	public function deleteProduct($id)
	{
		try
		{
			$stmt=$this->db->prepare("DELETE FROM tbl_product WHERE `id` = :id;");
			$stmt->bindparam(':id',$id);
			$stmt->execute();
		}
		catch(Exception $e)
		{
		 	echo $e->getMessage();
		}
	}
}