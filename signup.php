<!Doctype html>
 
  <html>
     
      <head>
      	  <title>PROJECT</title>
          <script type="text/javascript">
           function jsFunction(){
             alert('sorry your password does not match try again....');
            }
            function osFunction(){
             alert('CONNECTION FAILED');
            }
            function psFunction(){
             alert('REGISTRATION SUCCESSFUL');
            }
            function qsFunction(){
             alert('THIS USERNAME ALREADY EXISTS');
            }
          </script>
      </head>

      <style>
            body{
            	background-image:url("sign.jpg");  
              background-attachment: fixed;
              background-size: cover;
            }
            .topleft1{
            	position:absolute;
            	top:150px;
            	left:600px;
            	color:yellow;
            }
            .cname{
            	position:absolute;
            	top:300px;
            	left:560px;
            	color:red;
            	font-size:30px; 
            }
            .cpass{
              position:absolute;
              top:380px;
              left:560px;
              color:red;
              font-size:30px; 
            }
            .cconf{
              position:absolute;
              top:460px;
              left:560px;
              color:red;
              font-size:30px; 
            }
            .cnamet{
              position:absolute;
              top:310px;
              left:820px; 
            }
            .cpasst{
              position:absolute;
              top:390px;
              left:820px;
            }
            .cconft{
              position:absolute;
              top:470px;
              left:820px; 
            }
            .create{
              position:absolute;
              top:580px;
              left:620px;
            }
            .back{
                position:absolute;
              top:580px;
              left:870px; 
            }
      </style>
      
      <body>
   <?php
   if(isset($_POST["cr"])){
      if (isset($_POST['submit']))  
      echo "GeeksforGeeks"; 
      if(isset($_POST['name']) && isset($_POST['pass2']) && isset($_POST['pass'])){
      $name = $_POST['name'];
      $pass2 = $_POST['pass2'];
      $pass = $_POST['pass'];
      if($pass != $pass2)
        echo "<script type='text/javascript'>jsFunction();</script>";
      else{
      $conn = new mysqli('localhost','root','','signup');
      if($conn->connect_error)
      {
        die('Connection Failed : '.$conn->connect_error);
      }
      else
      {
        $q="select * from details where name = '$name' && pass2 ='$pass2' ";
        $result = mysqli_query($conn,$q);
        $num = mysqli_num_rows($result);
        if($num == 1)
          echo "<script type='text/javascript'>qsFunction();</script>";
        else{
        $stmt = $conn->prepare("insert into details(name,pass2) values(?,?)");
        $stmt->bind_param("ss",$name,$pass2);
        $stmt->execute();
        echo "<script type='text/javascript'>psFunction();</script>";
        $stmt->close();
        $conn->close();
        } 
      }
     }
    }
        else
        echo "<script type='text/javascript'>osFunction();</script>";
    }
  ?>
      	  <h1 class="topleft1"><u>ENTER YOUR DETAILS</u></h1>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <label for="name" class="cname">Username:</label>
              <input type="text" id="name" name="name" class="cnamet" required><br><br>
              
              <label for="pass" class="cpass">Enter password:</label>
              <input type="Password" id="pass" name="pass" class="cpasst" required><br>
              
              <label for="pass2" class="cconf">Confirm password:</label>
              <input type="Password" id="pass2" name="pass2" class="cconft" required><br>
              
              <input type="submit" value="Create Account" class="create" name="cr">
      	  </form> 
           <a href="project.php">
              <button class="back">Back</button>
          </a>
          <script> 
            if (isset($_POST['submit'])) { 
                echo "GeeksforGeeks"; 
            } 
        </script> 
      </body>	




  </html>    