<?php

require "Connect.class.php";

class CakeModel {
	
	//get all cake types from the database and return them in an array.
	function GetCakeTypes(){
		$conn = Connect::getInstance();
		$result = $conn->query("SELECT DISTINCT type FROM kolaci");
		$types = array();
		
		//get data from database
		while($row = $result->fetch(PDO::FETCH_NUM)){
			array_push($types, $row[0]);
		}
		//close connection and return results
		$conn = null;
		return $types;
	}
	
	//get cakeEntity objects from the database and return them in an array.
	function GetCakeByType($type){
		$conn = Connect::getInstance();
		$query = "SELECT * FROM kolaci WHERE type LIKE '$type'";
		$result = $conn->query($query);
		$cakeArray = array();
		
		//get data from database
		while($row = $result->fetch(PDO::FETCH_NUM)){
			$id = $row[0];
			$type = $row[1];
			$name = $row[2];
			$price = $row[3];
			$text = $row[4];
			$img = $row[5];
			
			//create cake object and store them in an array.
			$cake = new CakeEntity($id, $type, $name, $price, $text, $img);
			array_push($cakeArray, $cake);	
		}
		//close connection and return result.
		$conn = null;
		return $cakeArray;
	}
	
	//get cake 
	function GetCakeById($id){
		$conn = Connect::getInstance();
		$query = "SELECT * FROM kolaci WHERE id = '$id' ";
		$result = $conn->query($query);
		
		//get data from database
		while($row = $result->fetch(PDO::FETCH_NUM)){
			$type = $row[1];
			$name = $row[2];
			$price = $row[3];
			$text = $row[4];
			$img = $row[5];
			
			//create cake 
			$cake = new CakeEntity($id, $type, $name, $price, $text, $img);
		}
		//close connection and return result.
		$conn = null;
		return $cake;
	}
	
	
	function InsertCake(CakeEntity $cake){
		$q = "INSERT INTO kolaci 
						(type, name, price, text, img)
						VALUES
						(?,?,?,?,?)";
		$query = Connect::getInstance();
		$query = $query->prepare($q);
		$query->bindValue(1, $cake->type);
		$query->bindValue(2, $cake->name);
		$query->bindValue(3, $cake->price);
		$query->bindValue(4, $cake->text);
		$query->bindValue(5, $cake->img);
		$query->execute();
		$query = null;
	}
	
	function UpdateCake($id, CakeEntity $cake){
		$q = "UPDATE kolaci
							SET type = ?, name = ?, price = ?, text = ?, img = ?
							WHERE id = '$id'";
		$query = Connect::getInstance();
		$query = $query->prepare($q);
		$query->bindValue(1, $cake->type);
		$query->bindValue(2, $cake->name);
		$query->bindValue(3, $cake->price);
		$query->bindValue(4, $cake->text);
		$query->bindValue(5, $cake->img);
		$query->execute();
		$query = null;
	}
	
	function DeleteCake($id){
		$q = "DELETE from kolaci WHERE id = '$id'";
		$query = Connect::getInstance();
		$query = $query->prepare($q);
		$query->execute();
		$query = null;
	}
	
}	