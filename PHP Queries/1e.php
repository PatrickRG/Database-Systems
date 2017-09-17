
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
$CustomerID = $_POST['cust'];

$tableSqlBefore = "SELECT * FROM CustomerProductIT";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore)){
	echo "CustomerID: ". " ". $row['CustomerID'].  "      Item Purchased". $row['ModelNumber'];
	echo "<br />";
}

echo "<br /><br /><br /><br />";

$sql = "SELECT Customer.FirstName, Customer.LastName, Customer.CustomerID, COUNT(CustomerProductIT.CustomerID) FROM Customer INNER JOIN CustomerProductIT ON CustomerProductIT.CustomerID = '$CustomerID' AND Customer.CustomerID = '$CustomerID' GROUP BY Customer.CustomerID;";
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($result);

echo "Total Purchases by ". $row['FirstName']. " ". $row['LastName']. ":  ". $row['COUNT(CustomerProductIT.CustomerID)'];
echo "<br />";

mysql_close();

?>
