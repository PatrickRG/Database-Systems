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

//Create index on the secondary key of AntiVirus
$sql = "CREATE UNIQUE INDEX AntiKey ON AntiVirus(ModelNumber, SoftwareVersion);";
mysql_query($sql) or die ('Error updating database: '.mysql_error());
echo "AntiVirus index on Secondary Key Created\r\n";

echo "<br />";
echo "<br />";

//Show that the Index is operational
$sql2 = "SELECT ActivationKey FROM AntiVirus Use INDEX (AntiKey);";
$result = mysql_query($sql2) or die ('Error updating database: '.mysql_error());

while($row = mysql_fetch_array($result)){
	echo "Activation Key: ". $row['ActivationKey'];
	echo "<br />";
}

mysql_close();

?>
