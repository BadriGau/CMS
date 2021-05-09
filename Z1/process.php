<?php
require_once('../database/connection.php');
if(empty($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] < 1) {
			 die();
			  }
			  $id = $_GET['id'];
			  	mysqli_query($connection, "DELETE FROM hostname WHERE Id=$id") or die ("DB error: $dbname");
			  include("host.php");

?>