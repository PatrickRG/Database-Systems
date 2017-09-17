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

//Create a function that retrieved the most expensive product out of the Product Table
$sql = "CREATE FUNCTION MaxPrice() RETURNS DECIMAL RETURN (SELECT MAX(Price) FROM Product)";
$result = mysql_query($sql) or die ('Error updating database: '.mysql_error());

echo "Function successfully implemented";
mysql_close();
header("refresh:8; url=index.html");
?>
