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

$sql = "CREATE UNIQUE INDEX CellModel ON CellPhone(ModelNumber);";

mysql_query($sql) or die ('Error updating database: '.mysql_error());
echo "CellPhone index on Model Number Created\r\n";
echo "<br />";
echo "<br />";
$sql2 = "SELECT ModelNumber FROM CellPhone Use INDEX (CellModel);";
$result = mysql_query($sql2) or die ('Error updating database: '.mysql_error());

while($row = mysql_fetch_array($result)){
	echo "ModelNumber: ". $row['ModelNumber'];
	echo "<br />";
}

mysql_close();

?>
