<?php
      if (isset($_POST['submit']))  
      echo "GeeksforGeeks"; 
      if(isset($_POST['name']) && isset($_POST['pass'])){
      $name = $_POST['name'];
      $pass = $_POST['pass'];
      $conn = new mysqli('localhost','root','','signup');
      if($conn->connect_error)
      {
      	die('Connection Failed : '.$conn->connect_error);
      }
      else
      {
      	$q="select * from details where name = '$name' && pass2 ='$pass' ";
      	$result = mysqli_query($conn,$q);
      	$num = mysqli_num_rows($result);
      	if($num == 1)
      	{
          $sql="delete from details where name = '$name' && pass2 ='$pass' ";
          if(mysqli_query($conn, $sql))
          header('Location: project.html');
        }
      	else{
      	  echo "YOU ENTERED WRONG CREDENTIALS";
        } 
  }
  }
  else
  	echo "connection failed";
?>