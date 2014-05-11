<?php
	// this script checks if the user is authorized

	// first start a session --> compute session id
	session_start();
	
	$hostname = $_SERVER['HTTP_HOST'];
	$path = $_SERVER['PHP_SELF'];
	
	$sessionLoggedIn = (isset($_SESSION['authenticated'])) ? $_SESSION['authenticated'] : false;
	$username = (isset($_SESSION['username'])) ? $_SESSION['username'] : false;


?>