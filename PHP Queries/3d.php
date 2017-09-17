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

//Select database
mysql_select_db("******", $conn);

//Show fields of BannedCustomers before field addition
$tableSqlBefore = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'BannedCustomers'";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());
echo "<br />";
while ($row = mysql_fetch_row($tableBefore)) {
    echo "$row[3]\n";
    echo "<br />";
}

//Add field 'State' to BannedCustomers
$sql = "ALTER TABLE BannedCustomers DROP COLUMN State;";

mysql_query($sql) or die ('Error updating database: '.mysql_error());
echo "FIELD OF State Dropped in BannedCustomers";

echo "<br /><br /><br /><br />";

//Show that the field was indeed added
$tableSqlAfter = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'BannedCustomers'";
$tableAfter = mysql_query($tableSqlAfter) or die(mysql_error());

echo "FROM THE QUERY: 'SELECT * FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'BannedCustomers''";
echo "<br />";
while ($row = mysql_fetch_row($tableAfter)) {
    echo "$row[3]\n";
    echo "<br />";
}
echo "<br /><br /><br /><br />";

mysql_close();
?>
