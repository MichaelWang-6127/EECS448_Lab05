<!DOCTYPE html>
<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "mwang", "m806w839", "mwang");
  if ($mysqli->connect_errno)
  {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $username = $_GET['username'];
  $posttext = $_GET['posttext'];

  $query1="INSERT INTO Posts (content, author_id) VALUES ('$posttext','$username')";
  
  $search = "SELECT user_id FROM Users WHERE user_id = '$username'";

  if(!isset($posttext) || $posttext !== '')
  {
      $listOfUsers =  $mysqli->query($search);
      if($listOfUsers->num_rows>0)
      {
        while($row = $listOfUsers->fetch_assoc())
        {
          if($row["user_id"] == $username)
          {
            $result = true;
            break;
          }
        }
      }
      
      if($result)
      {
        if(($result = $mysqli->query($query1)) == true)
        {
          echo "post successfully added".PHP_EOL;
        }
        else
        {
          echo "not successfully added".PHP_EOL;
        }
      }
      else
      {
        echo "not successfully added b/c username does not exist".PHP_EOL;
      }
  }
  else
  {
      echo "not successfully added b/c post is emtpy".PHP_EOL;
  }

?>
