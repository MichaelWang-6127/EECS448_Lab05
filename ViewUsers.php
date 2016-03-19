<!DOCTYPE html>
  	<?php
	  	$mysqli = new mysqli("mysql.eecs.ku.edu", "mwang", "m806w839", "mwang");
		if ($mysqli->connect_errno)
		{
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}

	  	$search = "SELECT user_id FROM Users";
		echo "table of all users".PHP_EOL;		
	  	echo "<table border='5'>";

	  	$listOfUsers =  $mysqli->query($search);

		while($row = $listOfUsers->fetch_assoc())
		{
			echo "<td>".$row["user_id"]."</td>".PHP_EOL; 
		}
		echo "</table>";
	?>