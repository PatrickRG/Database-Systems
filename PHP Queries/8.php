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

//Create a stored procedure that retrieves the cheapest product within the Product table
$sql1 = "CREATE PROCEDURE MinPrice() SELECT MIN(Product.Price) FROM Product;";
mysql_query($sql1) or die ('Error updating database: The procedure already exists.'.mysql_error());

echo "Procedure successfully implemented";

//call it
$sql = "CALL MinPrice();";
$result = mysql_query($sql) or die ('Error updating database: '.mysql_error());


mysql_close();
header("refresh:8; url=index.html");
?>
