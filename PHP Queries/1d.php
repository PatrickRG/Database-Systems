
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
$Man = $_POST['Manufacturer'];

$tableSqlBefore = "SELECT * FROM Product";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore)){
	echo "ModelNumber: ". " ". $row['ModelNumber'].  "      Manufacturer". $row['Manufacturer']. "      Price: ". $row['Price'];
	echo "<br />";
}

echo "<br /><br /><br /><br />";

$sql = "SELECT COUNT(Manufacturer) FROM Product WHERE Manufacturer = '$Man' HAVING COUNT(Manufacturer) > 1";
$result = mysql_query($sql) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	echo "Number of products ". $Man. " has in the database: ". $row['COUNT(Manufacturer)'];
	echo "<br />";
}

mysql_close();
?>
