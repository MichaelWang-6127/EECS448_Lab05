<!DOCTYPE html>
<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "mwang", "m806w839", "mwang");
  if ($mysqli->connect_errno)
  {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $username = $_GET['username'];

  $query="INSERT INTO Users (user_id) VALUES ('{$username}')";

  if(($result = $mysqli->query($query)) == true)
  {
    echo "successfully added".PHP_EOL;
  }
  else
  {
    echo "not successfully added".PHP_EOL;
  }

?>
