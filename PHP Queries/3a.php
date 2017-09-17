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

$tableSqlBefore = "SHOW TABLES;";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());

echo "Tables: ";
echo "<br />";
echo "<br />";

while ($row = mysql_fetch_row($tableBefore)) {
    echo "$row[0]\n";
    echo "<br />";
}
echo "<br />";

$sql = "CREATE TABLE BannedCustomers(
    FirstName VARCHAR(20) NOT NULL,
    LastName VARCHAR(20) NOT NULL,
    Phone VARCHAR(22),
    Email VARCHAR(100)
);";

mysql_query($sql) or die ('Error updating database: '.mysql_error());
echo "TABLE BANNEDCUSTOMERS CREATED";
echo "<br />";
echo "<br />";

echo "Tables: ";
echo "<br />";
echo "<br />";
$tableSqlAfter = "SHOW TABLES;";
$tableAfter = mysql_query($tableSqlAfter) or die(mysql_error());

echo "<br />";

while ($row = mysql_fetch_row($tableAfter)) {
    echo "$row[0]\n";
    echo "<br />";
}

mysql_close();

?>
