<!DOCTYPE html>
<html>
<head>
<title>Host Details</title>
<meta http-equiv="refresh" content="10"/>
</head>
<body>

<?php
require_once('../database/connection.php');
$result = mysqli_query($connection, "SELECT * FROM hostname") or die ("DB error: $dbname");
print "<TABLE CELLPADDING=5 BORDER=1 >";
print "<TR><TD>id</TD><TD>Address</TD><TD>port</TD><TD>Status</TD><TD>Failed Times</TD><TD>Failed Time</TD><TD>Total Failed Time</TD><TD>Action</TD></TR>\n";
$count=0;
while ($row = mysqli_fetch_array ($result)) {
$id = $row[0];
$address = $row[1];
$port = $row[2];
$failedCon = $row[3];
$ftime = $row[4];
$totTime = $row[5];
$count++;
    
    $T = date('Y-m-d')."       ".date('h:i:sa');
    
    $fp = @fsockopen($address, $port, $errno, $errstr, 30);
 if ($fp) { $is_ok = "ok";
  mysqli_query($connection, "update hostname set failedCon = 0");
 mysqli_query($connection, "update hostname set FailedTime = '---' where Id = $id");
    
 } else {
     $is_ok = ' out-of-order ';
      
      $h = mysqli_query($connection, "update hostname set failedCon = $failedCon + 1 where Id = $id");
      
      
         if($failedCon==1){
             mysqli_query($connection, "update hostname set FailedTime =DATE_FORMAT(NOW(),'%Y-%m-%d %T') where Id = $id");
            // mysqli_query($connection, "insert into hostname (Id,Address,port,failedCon,Totaltime) values($id,$address,$port,$failedCon,DATE_FORMAT(NOW(),'%Y-%m-%d %T'),$totTime");
         }
         else{
           //mysqli_query($connection, "update hostname set FailedTime = '---' where Id = $id");
         }
      //mysqli_query($connection, "insert into failee (Id,timeT,Idhost) values(1,DATE_FORMAT(NOW(),'%Y-%m-%d %T'),$id)");
  
    //mysqli_query($connection, "update hostname set FailedTime =DATE_FORMAT(NOW(),'%Y-%m-%d %T') where Id = $id");
     }
    
     
if (!$fp) { $is_ok = "$errstr ($errno)"; }
print "<TR><TD>$count</TD><TD>$address</TD><TD>$port</TD><TD>$is_ok</TD><TD>$failedCon</TD><TD>$ftime</TD><TD>$totTime</TD><TD><a href='process.php?id=$id' >Remove</a></TD></TR>\n";
}
print "</TABLE>";

mysqli_close($connection);
?>

<p>Click here to add and verify new site's working status details <a href="Check.php"> Check here </a></p>


</body>
</html>