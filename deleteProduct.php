<?php require_once 'accesscontrol.php'; ?>
<?php require_once 'functions.php';?>
<?php confirmLoggedIn(); ?>

<?php
	$prodId = $_GET["id"];
	if(deleteProduct($prodId)){
		header('Location: inventory.php');
	}else{
		//echo 'error deleting';
	}
?>