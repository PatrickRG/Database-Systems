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

//My cursor deletes all customers that have a CustomerID that is greater than '9'
//Iterate through all customers and delete as we go
$sql = "
CREATE PROCEDURE customerDeleteCursor()
BEGIN
  DECLARE done INT DEFAULT FALSE;
  DECLARE x INT;
  DECLARE customer_cursor CURSOR FOR SELECT CustomerID FROM Customer;
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

  OPEN customer_cursor;

  read_loop: LOOP
    FETCH customer_cursor INTO x;
    IF done THEN
      LEAVE read_loop;
    END IF;

    IF x > 9  THEN
      DELETE FROM Customer WHERE CustomerID = x;
    END IF;
  END LOOP;

  CLOSE customer_cursor;
END;
";
$result = mysql_query($sql) or die ('Error updating database: '.mysql_error());

echo "Cursor successfully implemented";
mysql_close();
header("refresh:8; url=index.html");
?>
