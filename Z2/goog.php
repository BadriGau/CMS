<?php
$ipaddress = $_SERVER["REMOTE_ADDR"];

$dbhost="localhost"; $dbuser="id15600181_badri"; $dbpassword="19970301@Bad"; $dbname="id15600181_cms";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$connection) {
echo " MySQL Connection error." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
echo "Error: " . mysqli_connect_error() . PHP_EOL;
exit;
}
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