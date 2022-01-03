<?php 
	session_start();

	$cred1 = "@Zq9gq776";
	$cred2 = "root";

	// connect to database
	$conn = mysqli_connect("localhost", "root", $cred1, "O9G");

	if(!$conn){
		$conn = mysqli_connect("localhost", "root", $cred2, "O9G");
	}
			if(!$conn){
		$conn = mysqli_connect("localhost", "obnoxious9", $cred1, "O9G");
	}
	
	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
       // coming soon...
	
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/');
?>