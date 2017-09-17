
<?php
$servername = 'cs.okstate.edu';
//removed for security purposes
$username = "******";
$password = "******";

// Create connection
$conn = mysql_connect($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysql_select_db("******", $conn);

$tableSqlBefore = "SELECT * FROM Product";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore)){
	echo "ModelNumber: ". " ". $row['ModelNumber'].  "     Manufacturer:". $row['Manufacturer']. "      Price: ". $row['Price'];
	echo "<br />";
}
echo "<br /><br /><br /><br />";


$Man = $_POST['Manufacturer'];
$MinPrice = $_POST['MinPrice'];

$sql = "SELECT COUNT(*), SUM(Price), Manufacturer FROM Product WHERE Manufacturer = '$Man' AND Price > '$MinPrice' GROUP BY Manufacturer";
$result = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_array($result)){
	echo "Number of Products by". " ". $row['Manufacturer']. " - ". $row['COUNT(*)'].  "   Sum of all prices: ". $row['SUM(Price)'];;
	echo "<br />";
}




mysql_close();
?>
