<?php
$ipaddress = $_SERVER["REMOTE_ADDR"];

require_once('../database/connection.php');
mysqli_query($connection, "INSERT INTO googLink (Address) VALUES('$ipaddress')") or die ("DB error: $dbname");
$result = mysqli_query($connection, "SELECT id,Address,datetime as dt,COUNT(*) FROM googLink GROUP BY Address ORDER BY `dt` DESC;") or die ("DB error: $dbname");
print "<TABLE CELLPADDING=5 BORDER=1 >";
$id = 0;
print "<TR><TD>id</TD><TD>Address</TD><TD>Date/Time</TD><TD>Number of Visits</TD><TD>Map Link</TD></TR>\n";
while ($row = mysqli_fetch_array ($result)) {
$address = $row[1];
$datetime = $row[2];
$count = $row[3];
$id++;
$map ="<a href='https://www.google.pl/maps/place/'.$ipaddress> map link </a>";

print "<TR><TD>$count</TD><TD>$address</TD><TD>$datetime</TD><TD>$count</TD><TD>$map</TD></TR>\n";
}
print "</TABLE>";

mysqli_close($connection);
?>