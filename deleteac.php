<!Doctype html>
 
  <html>
     
      <head>
      	  <title>PROJECT</title>
          <script type="text/javascript">
           function psFunction(){
             alert('YOU ENTERED WRONG CREDENTIALS');
            }
            function osFunction(){
             alert('CONNECTION FAILED');
            }
            function jsFunction(){
             alert('DELETED SUCCESSFULLY');
            }
          </script>
      </head>

      <style>
            body{
            	background-image:url("deleteac.jpg");  
              background-attachment: fixed;
              background-size: cover;  
            }
            .topleft1{
            	position:absolute;
            	top:180px;
            	left:580px;
            	color:chartreuse;
            }
            .topleft{
            	position:relative;
            	top:330px;
            	left:570px;
            	color:yellow;
            	font-size:30px; 
            }
            .topleft2{
            	position:relative;
            	top:330px;
            	left:670px;
            }
            .topleft3{
            	position:relative;
            	top:330px;
            	left:678px;
            }
            .login{
            	position:relative;
            	top:450px;
            	left:720px;
            }
      </style>
      
      <body>
    <?php
     if(isset($_POST["dl"])){
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
          {echo "<script type='text/javascript'>jsFunction();</script>";  
          header('Location: project.php');}
        }
        else{
          echo "<script type='text/javascript'>psFunction();</script>";
        } 
     }
    }
          else
          echo "<script type='text/javascript'>osFunction();</script>";
      }
?>
      	  <h1 class="topleft1"><u>DELETE THE ACCOUNT</u></h1>
      	  <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
              <label for="name" class="topleft">Username:</label>
              <input type="text" id="name" name="name" class="topleft2" required><br><br>
              <label for="pass" class="topleft">Password:</label>
              <input type="Password" id="pass" name="pass" class="topleft3" required><br>
              <input type="submit" value="Delete" class="login" name="dl">
      	  </form>
          <script> 
            if (isset($_POST['submit'])) { 
                echo "GeeksforGeeks"; 
            } 
        </script> 
      </body>	  

  </html>    