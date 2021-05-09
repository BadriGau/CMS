<?php
require_once('../database/connection.php');

	$address  = $_POST['addres'];
	$port  = $_POST['port'];
	if (IsSet($_POST['send'])) {
		mysqli_query($connection, "INSERT INTO hostname(Address,port) VALUES('$address','$port')") or die ("DB error: $dbname");
	} 
	include("host.php");
	
?>