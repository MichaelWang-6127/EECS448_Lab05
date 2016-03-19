<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "mwang", "m806w839", "mwang");
	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$dPost = $_GET['postId'];
	
	foreach($dPost as &$value)
	{
		$delete =  "DELETE FROM Posts WHERE post_id='$value'";

		if(($result = $mysqli->query($delete)))
		{
			echo "deleted post".PHP_EOL;
			echo $value.PHP_EOL;
		}
		else
		{
			echo "delete not successful".PHP_EOL;
		}
	}

	echo "<a href='http://people.eecs.ku.edu/~mwang/EECS448_Lab05/DeletePost.html'>".'Click to return to table'."</a>".PHP_EOL;
?>