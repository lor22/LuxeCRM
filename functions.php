<?php 
	include 'database.php';
	
	//INSERTS
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
	//END INSERTS

	//EDITS
	function editProduct($name, $price, $units, $active, $id){
	      $db = Database::connect();
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $stmt = $db->prepare('UPDATE Products SET ProdName=?, ProdPrice=?, ProdUnits=?, ProdActive=? WHERE ProdId=?');
	      $result = $stmt->execute(array($name, $price, $units, $active, $id));
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
	//END EDITS
	
	//VIEWS
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
	
	function viewActiveProducts(){
	      $db = Database::connect();
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $stmt = $db->query('select * from Products where ProdActive = "YES";');
         Database::disconnect();
         return $stmt;
	}
	
	function viewNonActiveProducts(){
	      $db = Database::connect();
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $stmt = $db->query('select * from Products where ProdActive = "NO";');
         Database::disconnect();
         return $stmt;
	}
	//END VIEWS
	
	//FINDERS
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
	//END FINDERS
	
	//MISCELLANEOUS 
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
	//END MISCELLANEOUS
	
	//VALIDATION
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
	//END VALIDATION
	
	
?>