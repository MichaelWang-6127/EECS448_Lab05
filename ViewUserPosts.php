<!DOCTYPE html>

	<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "mwang", "m806w839", "mwang");
		if ($mysqli->connect_errno)
		{
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}

		$username = $_GET['Users'];

		$search = "SELECT content FROM Posts WHERE author_id = '$username'";

		echo "table of all posts by this user".PHP_EOL;		
	  	echo "<table border='5'>";

	  	$postsFromUser =  $mysqli->query($search);

		while($row = $postsFromUser->fetch_assoc())
		{
			echo "<td>".$row["content"]."</td>".PHP_EOL; 
		}
		echo "</table>";

		echo "<a href='http://people.eecs.ku.edu/~mwang/EECS448_Lab05/ViewUserPosts.html'>".'Click to return to table'."</a>".PHP_EOL;

	?>