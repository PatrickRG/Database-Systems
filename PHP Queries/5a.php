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

echo "Desktop Table:";
echo "<br />";
$tableSqlBefore = "SELECT * FROM Desktop";
$tableBefore = mysql_query($tableSqlBefore) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore)){
	echo "ModelNumber: ". " ". $row['ModelNumber'].   "&nbsp &nbsp Manufacturer: ". $row['Manufacturer'].   "&nbsp &nbsp Price: ". $row['Price'].   "&nbsp &nbsp Manufacturer: ". $row['Manufacturer'].   "&nbsp &nbsp CPUClock: ". $row['CPUClock'].   "&nbsp &nbsp MemorySize: ". $row['MemorySize'].   "&nbsp &nbsp DiskSize: ". $row['DiskSize'].   "&nbsp &nbsp DedicatedGPU: ". $row['DedicatedGPU'];
	echo "<br />";
}

echo "Laptop Table:";
echo "<br />";

$tableSqlBefore2 = "SELECT * FROM Laptop";
$tableBefore2 = mysql_query($tableSqlBefore2) or die(mysql_error());

while($row = mysql_fetch_array($tableBefore2)){
		echo "ModelNumber: ". " ". $row['ModelNumber'].   "&nbsp &nbsp Manufacturer: ". $row['Manufacturer'].   "&nbsp &nbsp Price: ". $row['Price'].   "&nbsp &nbsp Convertible: ". $row['Convertible'].   "&nbsp &nbsp Webcam: ". $row['Webcam'].   "&nbsp &nbsp SizeInInches: ". $row['SizeInInches'];
	echo "<br />";
}

echo "<br /><br /><br /><br /><br />";
echo "Query::";
echo "<br />";

$sql = "SELECT * FROM Desktop WHERE Price > (SELECT MIN(Price) FROM Laptop);";
$result = mysql_query($sql) or die ('Error updating database: '.mysql_error());

while($row = mysql_fetch_array($result)){
	echo "ModelNumber: ". $row['ModelNumber']. "   Manufacturer: ". $row['Manufacturer']. "   Price: ". $row['Price']. "   CPUClock: ". $row['CPUClock']. "   MemorySize: ". $row['MemorySize']. "   DiskSize: ". $row['DiskSize']. "   DedicatedGPU: ". $row['DedicatedGPU'];
	echo "<br />";
}
mysql_close();

?>
