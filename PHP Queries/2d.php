<?php
$servername = 'cs.okstate.edu';
//removed for security purposes
$username = "******";
$password = "******";

// Create the connection
$conn = mysql_connect($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Select Databse
mysql_select_db("******", $conn);

//Print view before query is run
$tableSqlBefore = "SELECT * FROM MonitorLaptop";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore)){
	echo "ModelNumber: ". " ". $row['ModelNumber'].  "&nbsp &nbsp Manufacturer: ". $row['Manufacturer'];
	echo "<br />";
}

echo "<br /> <br />";

//Grab entries from the HTML form
$ModelNumber = $_POST['ModelNumber'];
$Manufacturer = $_POST['Manufacturer'];
$Price = $_POST['Price'];
$Resolution = $_POST['Resolution'];
$RefreshRate = $_POST['RefreshRate'];
$Latency = $_POST['Latency'];
$sqlProd = "INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('$ModelNumber', '$Manufacturer', '$Price');";
$resultProd = mysql_query($sqlProd) or die(mysql_error());

//Insert a new entry into the table where the view is looking (created from 2a)
$sql = "INSERT INTO Monitor (ModelNumber, Manufacturer, Price, Resolution, RefreshRate, Latency) VALUES ('$ModelNumber', '$Manufacturer', '$Price', '$Resolution', '$RefreshRate', '$Latency');";
$result = mysql_query($sql) or die(mysql_error());

echo "<br />";
echo "Inserted successfully";
echo "<br /> <br /> <br /> <br />";

//Print view after query is run
$tableSqlAfter = "SELECT * FROM MonitorLaptop";
$tableAfter = mysql_query($tableSqlAfter) or die(mysql_error());

while($row = mysql_fetch_array($tableAfter)){
	echo "ModelNumber: ". " ". $row['ModelNumber'].  "&nbsp &nbsp Manufacturer: ". $row['Manufacturer'];
	echo "<br />";
}

mysql_close();
?>
