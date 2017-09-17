
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
$Man = $_POST['Man'];

$tableSqlBefore = "SELECT * FROM ProductList400";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore)){
	echo "ModelNumber: ". " ". $row['ModelNumber'].  "&nbsp &nbsp Manufacturer: ". $row['Manufacturer'].  "&nbsp &nbsp Price: ". $row['Price'];
	echo "<br />";
}
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
$sql = "SELECT * FROM ProductList400 WHERE Manufacturer = '$Man';";
$result = mysql_query($sql) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	echo "Manufacturer: ". $row['Manufacturer']. "   Model Number: ". $row['ModelNumber'];
	echo "<br />";
}


mysql_close();
header("refresh:8; url=index.html");
?>
