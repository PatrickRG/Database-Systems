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

mysql_select_db("*******", $conn);

//Create a trigger that automatically removes a customer from the BannedCustomers table IF AND ONLY IF they are added back to the Customer table
$sql = "CREATE TRIGGER UnBanCustomer
AFTER INSERT ON Customer
FOR EACH ROW
DELETE FROM BannedCustomers WHERE FirstName = BannedCustomers.FirstName;
";
$result = mysql_query($sql) or die ('Error updating database: '.mysql_error());

echo "Trigger successfully implemented";
mysql_close();
header("refresh:8; url=index.html");
?>
