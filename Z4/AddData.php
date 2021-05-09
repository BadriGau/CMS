<!DOCTYPE html>
<html>
    <head>
        <title>Graph</title>
    </head>
<body>
    <?php
require_once('../database/connection.php');
	
	if (IsSet($_POST['send'])) {
	    $x1  = $_POST['x1'];
	$x2  = $_POST['x2'];
	$x3  = $_POST['x3'];
	$x4  = $_POST['x4'];
	$x5  = $_POST['x5'];
		mysqli_query($connection, "INSERT INTO measurements (X1,X2,X3,X4,X5) VALUES('$x1','$x2','$x3','$x4','$x5')") or die ("DB error: $dbname");
	} 
?>


<form method="POST">
  <label for="X1">Value for X1:</label>
  <input type="number" name="x1"><br>
  <label for="X2">Value for X2:</label>
  <input type="number" name="x2"><br>
  <label for="X3">Value for X3:</label>
  <input type="text" name="x3"><br>
  <label for="X4">Value for X4:</label>
  <input type="text" name="x4"><br>
  <label for="X5">Value for X5:</label>
  <input type="text" name="x5"><br>
  <input type="submit" name="send" value="Save Value">
  
</form>

  
  <p>click here to see the plot <a href="visual.php"> View Plot </a></p>




</body>
</html>