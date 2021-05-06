<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sty.css">
</head>
<body>
<form method="POST" action="add.php">
<br>
Nick:<input type="text" name="user" maxlength="10" size="10"><br>
Post:<input type="text" name="post" maxlength="90" size="90"><br>
<input type="submit" value="Send"/>
</form>

<h3>Messages</h3>

        <div class="content">
<table class="table table-striped" border="1" width="90%">
	   <thead class="fi">
	    <tr>
		   <th scope="col">Sender</th>
		   <th scope="col">Message</th>
		   <th scope="col">Time</th>
		      </tr>
		   </thead>
		   <tbody>
		       <?php
		       		       $dbhost="localhost"; $dbuser="id15600181_badri"; $dbpassword="19970301@Bad"; $dbname="id15600181_cms";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$connection) {
echo " MySQL Connection error." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
echo "Error: " . mysqli_connect_error() . PHP_EOL;
exit;
}

function getcolour($color) {
    switch($color)
    {
        case 1:
            return '#E600BF';
            break;
        case 2:
            return '#C0C0C0';
            break;
        case 3:
            return '#00FF00';
            break;
        case 4:
            return '#0000FF';
            break;
        case 5:
            return '#FF99FF';
            break;
        case 6:
            return '#FF9900';
            break;
        case 7:
            return '#FF0000';
            break;
        case 8:
            return '#FF0880';
            break;
        case 7:
            return '#F50800';
            break;
        default:
            return '#FFFFFF';
            break;
    }
}


		       $count=0;
		      // $result = mysqli_query($connection, "SELECT * FROM chat order by id desc") or die ("DB error: $dbname");
$result = mysqli_query($connection, "SELECT id,Nick,Message,Time FROM chat GROUP BY Nick order by id desc;") or die ("DB error: $dbname");

	    
	     while ($row = mysqli_fetch_array ($result)) {
				  $count++;
				  
				  $nick = $row['Nick'];
				  $time = $row['Time'];
				  $message = $row['Message'];
			    ?>
		     <tr>
			 <td bgcolor="<?php echo getcolour($count); ?>"><?php echo $nick;?></td>
			  <td width="20%"><?php echo $message ?></td>
			   <td width="20%"><?php echo $time;?></td>
			 </tr>
			 <?php
			   }
			 ?>
			 
			 </tbody>
		   </table>
		  
		   
</div>

