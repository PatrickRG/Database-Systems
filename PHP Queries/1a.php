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

$tableSqlBefore = "SELECT * FROM Customer";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore)){
	echo "Name: ". " ". $row['FirstName'].  " ". $row['LastName']. "      Phone: ". $row['Phone'].  "   Email: ". $row['Email'];;
	echo "<br />";
}
echo "<br /><br /><br /><br />";

$Fname = $_POST['FirstName'];
$Lname = $_POST['LastName'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];

$sql = "INSERT INTO Customer (FirstName, LastName, Phone, Email) VALUES ('$Fname', '$Lname', '$Phone', '$Email')";

mysql_query($sql) or die ('Error updating database: '.mysql_error());

echo "AFTER INSERT: <br />";
$tableSqlAfter = "SELECT * FROM Customer";
$tableAfter = mysql_query($tableSqlAfter) or die(mysql_error());

while($row = mysql_fetch_array($tableAfter)){
	echo "Name: ". " ". $row['FirstName'].  " ". $row['LastName']. "      Phone: ". $row['Phone'].  "   Email: ". $row['Email'];;
	echo "<br />";
}

mysql_close();
?>
