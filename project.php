<!Doctype html>
 
  <html>
     
      <head>
      	  <title>PROJECT</title>
          <script type="text/javascript">
           function jsFunction(){
             alert('THIS ACCOUNT IS NOT REGISTERED');
            }
            function osFunction(){
             alert('CONNECTION FAILED');
            }
          </script>
      </head>

      <style>
            body{
            	background-image:url("pro.jpg");  
              background-attachment: fixed;
              background-size: cover; 
            }
            .topleft1{
            	position:absolute;
            	top:180px;
            	left:480px;
            	color:yellow;
            }
            .topleft{
            	position:relative;
            	top:330px;
            	left:570px;
            	color:maroon;
            	font-size:30px; 
            }
            .topleft2{
            	position:relative;
            	top:330px;
            	left:670px;            }
            .topleft3{
            	position:relative;
            	top:330px;
            	left:678px;
            }
            .login{
            	position:relative;
            	top:450px;
            	left:630px;
            }
            .Signup{
                position:relative;
            	top:430px;
            	left:780px;	
            }
      </style>
      
      <body>
    <?php
    if(isset($_POST["log"])){
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
          header('Location: laundry.html');
        }
        else{
          echo "<script type='text/javascript'>jsFunction();</script>";
         } 
      }
         }
           else
          echo "<script type='text/javascript'>osFunction();</script>";
      }
         ?>
      	  <h1 class="topleft1"><u>DADWAL GREAT GRAND PARADISE</u></h1>
      	  <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
              <label for="name" class="topleft">Username:</label>
              <input type="text" id="name" name="name" class="topleft2" required><br><br>
              <label for="pass" class="topleft">Password:</label>
              <input type="Password" id="pass" name="pass" class="topleft3" required><br>
              <input type="submit" value="Login" name="log" class="login">
      	  </form>
      	  <a href="signup.php">
              <button class="Signup">Sign Up</button>
      	  </a>  
          <script> 
            if (isset($_POST['submit'])) { 
                echo "GeeksforGeeks"; 
            } 
        </script> 
      </body>	  

  </html>    