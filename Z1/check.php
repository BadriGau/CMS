<!DOCTYPE html>
<html>
    <head>
        <title>Site check</title>
    </head>
<body>

<form method="POST" action="verify.php">
  <label for="address">Site Address:</label>
  <input type="text" name="addres" placeholder="www.example.com"><br>
  <label for="port">Port Number:</label>
  <input type="number" name="port" placeholder="something like 80"><br>
  
  <input type="submit" name="send" value="Check Site">
  
</form>

</body>
</html>