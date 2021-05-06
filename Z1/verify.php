<?php
    
    $dbhost="localhost"; $dbuser="id15600181_badri"; $dbpassword="19970301@Bad"; $dbname="id15600181_cms";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$connection) {
echo " MySQL Connection error." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
echo "Error: " . mysqli_connect_error() . PHP_EOL;
exit;
}

	$address  = $_POST['addres'];
	$port  = $_POST['port'];
	if (IsSet($_POST['send'])) {
		mysqli_query($connection, "INSERT INTO hostname(Address,port) VALUES('$address','$port')") or die ("DB error: $dbname");
	} 
	include("host.php");
	
?>