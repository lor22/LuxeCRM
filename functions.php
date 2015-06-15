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
	
	function updateClientBuyRate($buyrate, $id){
      $db = Database::connect();
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $db->prepare('UPDATE Clients SET ClientBuyRate=? WHERE ClientId=?');
      $result = $stmt->execute(array($buyrate, $id));
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
	
	function seeBuyRate($id){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->prepare('SELECT AVG(ProdPrice) as BR FROM Products JOIN ProductsBySales ON ProductsBySales.IdProduct = Products.ProdId JOIN Sales ON Sales.SalesId = ProductsBySales.IdSale WHERE Sales.IdClient=?');
		$stmt->execute(array($id));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
		if($result > 0){
			return $result;
		}else{
			return null;
		}
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
	
	function viewSales(){
      $db = Database::connect();
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $db->query('SELECT Sales.SalesId, Clients.ClientName, Clients.ClientSurname, Products.ProdName, YEAR(Sales.SaleDate) as year, MONTH(Sales.SaleDate) as month, DAY(Sales.SaleDate) as day 
		FROM Clients, Sales, ProductsBySales, Products
		WHERE Sales.IdClient = Clients.ClientId
		AND Sales.SalesId = ProductsBySales.IdSale
		AND ProductsBySales.IdProduct = Products.ProdId');
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
	
	function findProductByThis($name){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->query('SELECT * FROM Products WHERE ProdName LIKE "%'.$name.'%" ORDER BY ProdName ASC;');
		return $stmt;
	}
	
	function findClientByThis($name){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->query('SELECT * FROM Clients WHERE ClientName LIKE "%'.$name.'%" or ClientSurname LIKE "%'.$name.'%" or ClientMail LIKE "%'.$name.'%" ORDER BY ClientSurname ASC;');
		return $stmt;
	}
	
	function findSaleByThis($name){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->query('SELECT Sales.SalesId, Clients.ClientName, Clients.ClientSurname, Products.ProdName, Sales.SaleDate FROM Sales, Products, Clients, ProductsBySales WHERE Products.ProdId = ProductsBySales.`IdProduct` and Sales.`IdClient` = Clients.`ClientId` and Sales.`SalesId` = ProductsBySales.`IdSale` and Products.`ProdName` LIKE "%'.$name.'%"');
		return $stmt;
	}
	//END FINDERS
	
	//MISCELLANEOUS 
	function topUser(){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->query('SELECT * from Clients WHERE ClientBuyRate=(SELECT MAX(ClientBuyRate) FROM Clients)');
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
      Database::disconnect();
      return $result;
	}
	
	function topProduct(){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->query('SELECT ProductsBySales.IdProduct, COUNT(IdProduct) as numberOfProd, Products.ProdName FROM ProductsBySales, Products Where Products.ProdID = ProductsBySales.IdProduct GROUP BY IdProduct ORDER BY COUNT(IdProduct) DESC');
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
      Database::disconnect();
      return $result;
	}
	
	function fiveLastClients(){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->query('SELECT Clients.ClientName, Clients.ClientSurname, DAY(Sales.SaleDate) as day, MONTH(Sales.SaleDate) as month, YEAR(Sales.SaleDate) as year 
			FROM Clients, Sales, ProductsBySales
			WHERE Sales.`IdClient` = Clients.`ClientId`
			AND Sales.`SalesId` = ProductsBySales.`IdSale`
			ORDER BY `SaleDate` DESC LIMIT 5');
		//$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		Database::disconnect();
		//return $results;
		return $stmt;
	}
	
	function fiveLastProducts(){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->query('SELECT Products.`ProdName` FROM Products JOIN `ProductsBySales` ON Products.ProdId = ProductsBySales.IdProduct ORDER BY IdProductSale DESC LIMIT 0,5');
		//$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		Database::disconnect();
		//return $results;
		return $stmt;
	}
		
	function monthlySales($month){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->prepare('SELECT SUM(ProdPrice) as total FROM (SELECT IdProduct FROM ProductsBySales JOIN `Sales` WHERE ProductsBySales.IdSale = Sales.SalesId AND MONTH(`SaleDate`) = ?) as hello, Products WHERE hello.IdProduct = Products.ProdId');
		$stmt->execute(array($month));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
		if($result > 0){
			return $result;
		}else{
			return null;
		}
	}
	
	function totalProducts($month){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->prepare('SELECT COUNT(*) as products FROM (SELECT IdProduct FROM ProductsBySales JOIN `Sales` WHERE ProductsBySales.IdSale = Sales.SalesId AND MONTH(`SaleDate`) = ?) as hello, Products WHERE hello.IdProduct = Products.ProdId');
		$stmt->execute(array($month));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
		if($result > 0){
			return $result;
		}else{
			return null;
		}
	}
	
	function getAllProd(){
		$db = Database::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db->query('SELECT COUNT(*) as ALLproducts FROM (SELECT IdProduct FROM ProductsBySales JOIN `Sales` WHERE ProductsBySales.IdSale = Sales.SalesId) as hello, Products WHERE hello.IdProduct = Products.ProdId');
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