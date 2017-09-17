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
echo "CustomerProductIT Table: ";
echo "<br />";

//Print CustomerProductIT table before query
$tableSqlBefore = "SELECT * FROM CustomerProductIT";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore)){
	echo "CustomerID: ". " ". $row['CustomerID'].  "      Item Purchased". $row['ModelNumber'];
	echo "<br />";
}
echo "<br /><br /><br /><br />";

//Print Customer table before Query
echo "Customer Table: ";
echo "<br />";
$tableSqlBefore2 = "SELECT * FROM Customer";
$tableBefore2 = mysql_query($tableSqlBefore2) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore2)){
	echo "Name: ". " ". $row['FirstName'].  " ". $row['LastName']. "      Phone: ". $row['Phone'].  "   Email: ". $row['Email'];;
	echo "<br />";
}

//Correlated subquery selecting FirstName and purchase number from CustomerProductIT and Customer
echo "<br /><br /><br /><br />";
$sql = "SELECT FirstName, (SELECT COUNT(CustomerID) FROM CustomerProductIT WHERE CustomerID = Customer.CustomerID GROUP BY CustomerID) AS num FROM Customer;";
$result = mysql_query($sql) or die ('Error updating database: '.mysql_error());

while($row = mysql_fetch_array($result)){
	echo "Name: ". $row['FirstName']. "   Purchases: ". $row['num'];
	echo "<br />";
}
mysql_close();
?>
