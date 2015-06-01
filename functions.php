<?php 
	include 'database.php';
	
	function insertNewProduct($name, $price, $units){
	      $db = Database::connect();
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $stmt = $db->prepare('insert into Products(ProdId, ProdName, ProdPrice, ProdUnits) values(null, ?, ?, ?)');
	      $result = $stmt->execute(array($name, $price, $units));
         Database::disconnect();
         return $result;
	}
	
	function insertNewClient($name, $surname, $mail, $phone, $address){
	      $db = Database::connect();
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $stmt = $db->prepare('INSERT INTO Clients VALUES (null, ?, ?, ?, ?, ?, 0.0,"YES")');
	      $result = $stmt->execute(array($name, $surname, $mail, $phone, $address));
         Database::disconnect();
         return $result;
	}

	function editProduct($name, $price, $units, $id){
	      $db = Database::connect();
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $stmt = $db->prepare('UPDATE Products SET ProdName=?, ProdPrice=?, ProdUnits=? WHERE ProdId=?');
	      $result = $stmt->execute(array($name, $price, $units, $id));
         Database::disconnect();
         return $result;
	}
	
	function editClient($name, $surname, $mail, $phone, $address, $active, $id){
	      $db = Database::connect();
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $stmt = $db->prepare('UPDATE Clients SET ClientName=?, ClientSurname=?, ClientMail=?, ClientPhone=?, ClientAddress=?, ClientActive=? WHERE ClientId=?');
	      $result = $stmt->execute(array($name, $surname, $mail, $phone, $address, $active, $id));
         Database::disconnect();
         return $result;
	}
	
	function deleteProduct($id){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->prepare('DELETE FROM Products WHERE ProdId=?');
		$result = $stmt->execute(array($id));
		Database::disconnect();
		if($result == 1){
			return true;
		}else{
			return false;
		}
	}
	
	function viewProducts(){
	      $db = Database::connect();
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $stmt = $db->query('select * from Products;');
         Database::disconnect();
         return $stmt;
	}
	
	function viewActiveClients(){
	      $db = Database::connect();
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $stmt = $db->query('select * from Clients where ClientActive = "YES";');
         Database::disconnect();
         return $stmt;
	}
	
	function viewNonActiveClients(){
	      $db = Database::connect();
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $stmt = $db->query('select * from Clients where ClientActive = "NO";');
         Database::disconnect();
         return $stmt;
	}
	
	function findUserByName($usr){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->prepare('SELECT * FROM user WHERE username = ? LIMIT 1');
		$stmt->execute(array($usr));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
		if($result > 0){
			return $result;
		}else{
			return null;
		}
	}
	
	function findProdById($id){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->prepare('SELECT * FROM Products WHERE ProdId = ?');
		$stmt->execute(array($id));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
		if($result > 0){
			return $result;
		}else{
			return null;
		}
	}
	
	function findClientById($id){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->prepare('SELECT * FROM Clients WHERE ClientId = ?');
		$stmt->execute(array($id));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
		if($result > 0){
			return $result;
		}else{
			return null;
		}
	}
	
	function topUser(){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->query('SELECT * FROM Clients WHERE ClientBuyRate >= 0.5');
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
      Database::disconnect();
      return $result;
	}
	
	function topProduct(){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->query('SELECT * FROM Products');
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
      Database::disconnect();
      return $result;
	}
	
	function validatePassword($uid, $pwd){
         $db = Database::connect();
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $stmt = $db->prepare('SELECT id, password FROM user WHERE id=? and password=?');
         $stmt->execute(array($uid, $pwd));
         $result = $stmt->fetch(PDO::FETCH_ASSOC);
			Database::disconnect();
         if($result > 0){
            return true;
	      }else{
	         return false;
	      }
	}
	
	function attemptLogin($username, $password) {
		$admin = findUserByName($username);
		if ($admin != null) {
			// found admin, now check password
			if (validatePassword($admin['id'], $password)) {
				// password matches
				return $admin;
			} else {
				// password does not match
				return false;
			}
		} else {
			return false;
		}
	}
	
	function loggedIn() {
		return isset($_SESSION['uid']);
	}
	
	function confirmLoggedIn() {
		if (!loggedIn()) {
			header("Location: login.php");
			exit;
		}
	}
	
	
?>