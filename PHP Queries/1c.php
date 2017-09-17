
<?php
$servername = 'cs.okstate.edu';
//removed for security purposes
$username = "******";
$password = "******";

// Create the connection
$conn = mysql_connect($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Select Databse
mysql_select_db("******", $conn);

//Grab entries from the HTML form
$T1 = $_POST['TableOne'];
$T2 = $_POST['TableTwo'];
$Man = $_POST['Manufacturer'];

//Print table before query is run
$tableSqlBefore = "SELECT * FROM $T1";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore)){
	echo "ModelNumber: ". " ". $row['ModelNumber'].  "      Manufacturer". $row['Manufacturer']. "      Price: ". $row['Price'];
	echo "<br />";
}

//white spsace
echo "<br /><br /><br /><br />";

//Print other table before query is run
$tableSqlBefore2 = "SELECT * FROM $T2";
$tableBefore2 = mysql_query($tableSqlBefore2) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore2)){
	echo "ModelNumber: ". " ". $row['ModelNumber'].  "      Manufacturer". $row['Manufacturer']. "      Price: ". $row['Price'];
	echo "<br />";
}

echo "<br /><br /><br /><br />";

//Get number of products in the two tables by a certain manufacturer, and sum the prices of those products
$sql = "SELECT COUNT(*), SUM(Price), Manufacturer FROM $T1 WHERE Manufacturer = '$Man' GROUP BY Manufacturer UNION ALL SELECT COUNT(*), SUM(Price), Manufacturer FROM $T2 WHERE Manufacturer = '$Man' GROUP BY Manufacturer;";
$result = mysql_query($sql) or die(mysql_error());

//Display results
while($row = mysql_fetch_array($result)){
    echo "Number of ". $T1. "s and ". $T2. "s by". " ". $row['Manufacturer']. " - ". $row['COUNT(*)'].  "   Sum of all prices: ". $row['SUM(Price)'];;
	echo "<br />";
}

echo "\r\n\r\n";

mysql_close();
?>
