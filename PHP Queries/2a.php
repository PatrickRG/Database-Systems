
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

$sql = "CREATE VIEW ProductList400 AS SELECT ModelNumber, Manufacturer, Price FROM Product WHERE Price > 399;";
$result = mysql_query($sql) or die(mysql_error());
echo "View was successfully created.";
echo "<br />";
echo "<br />";
$tableSqlBefore = "SELECT * FROM ProductList400";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore)){
	echo "ModelNumber: ". " ". $row['ModelNumber'].  "&nbsp &nbsp Manufacturer: ". $row['Manufacturer'].  "&nbsp &nbsp Price: ". $row['Price'];
	echo "<br />";
}

mysql_close();
?>
