<?php
require_once('../database/connection.php');
	
	if (ISSET($_POST['post'])) {
	    $user  = $_POST['user'];
	$post  = $_POST['post'];
$res = mysqli_query($connection, "INSERT INTO chat (Nick,Message) VALUES('$user','$post')") or die ("DB error: $dbname");
header('Location: conversation.php');
}
?>
			     
			  
			 