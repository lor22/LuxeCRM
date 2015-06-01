<?php require_once 'accesscontrol.php'; ?>

<?php
	// v1: simple logout
	// session_start();
	$_SESSION["uid"] = null;
	$_SESSION["usr"] = null;
	header("Location: login.php");
?>
