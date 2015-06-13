<?php
	require_once 'accesscontrol.php';
	
	if(empty($_POST) && empty($_GET)){
		echo 'error';
		exit();
	}
	
	include 'functions.php';

	switch($_POST["function"]){
		case "validateUser":
			$found_admin = attemptLogin($_POST["usr"], $_POST["pwd"]);
		   if($found_admin != null){
				$_SESSION["uid"] = $found_admin["id"];
				$_SESSION["usr"] = $found_admin["username"];
		      header('Location: index.php');
		   }else{
		      header('Location: login.php');
		   }
		break;
		case "newProduct":
		   if(insertNewProduct($_POST["prodName"], $_POST["prodPrice"], $_POST["prodUnits"])){
		      header('Location: inventory.php');
		   }else{
		      //error
		   }
		break;
		case "newClient":
			if(insertNewClient($_POST["clientName"], $_POST["clientSurname"], $_POST["clientMail"], $_POST["clientPhone"], $_POST["clientAddress"])){
				header('Location: clients.php');
			}else{
			   //error
			}
		break;
		case "editProduct":
			if(isset($_POST['my-checkbox'])){
	    		$isActive = "YES";
			}else{
	    		$isActive = "NO";
			}
			if(editProduct($_POST["prodName"], $_POST["prodPrice"], $_POST["prodUnits"], $isActive, $_POST["prodId"])){
				header('Location: inventory.php');
			}else{
				//error
			}
		break;	
		case "editClient":
			if(isset($_POST['my-checkbox'])){
		    	$isActive = "YES";
			}else{
		    	$isActive = "NO";
			}
			if(editClient($_POST["clientName"], $_POST["clientSurname"], $_POST["clientMail"], $_POST["clientPhone"], $_POST["clientAddress"], $isActive, $_POST["clientId"])){
				header('Location: clients.php');
			}else{
				//error
			}
		break;
		case "findClient":
			if(findClientByThis($_POST["clientName"])){
				header('Location: clients.php');
			}else{
			   //error
			}
		break;
	}
	

?>