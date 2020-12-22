<?php
      if (isset($_POST['submit']))  
      echo "GeeksforGeeks"; 
      if(isset($_POST['gname']) && isset($_POST['room']) && isset($_POST['garm']) && isset($_POST['cloth']) && isset($_POST['wash'])){
      $gname = $_POST['gname'];
      $room = $_POST['room'];
      $garm = $_POST['garm'];
      $cloth = $_POST['cloth'];  
      $wash = $_POST['wash'];  
      $conn = new mysqli('localhost','root','','po');
      if($conn->connect_error)
      {
      	die('Connection Failed : '.$conn->connect_error);
      }
      else
      {
        $q="select * from details where room = '$room'";
        $result = mysqli_query($conn,$q);
        $num = mysqli_num_rows($result);
        if($num == 0)
        {  
          $stmt = $conn->prepare("insert into details(gname,room,garm,cloth,wash) values(?,?,?,?,?)");
          $stmt->bind_param("siiss",$gname,$room,$garm,$cloth,$wash);
          $stmt->execute();
          echo "Your order is placed";
          $stmt->close();
          $conn->close();
        }
        else{
          echo "You have already given a order";
        } 	
      }
  }
  else
  	echo "connection failed";
?>