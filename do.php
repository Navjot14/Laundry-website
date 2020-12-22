<!Doctype html>
 
  <html>
     
      <head>
      	  <title>PROJECT</title>
          <script type="text/javascript">
           function jsFunction(){
             alert('ARE YOU SURE YOU WANT TO DELETE IF YES YOU WILL BE REDIRECTED TO LAUNDRY PAGE');
            }
          </script>
      </head>

      <style>
            body{
            	background-image:url("do.jpg");  
              background-attachment: fixed;
              background-size: cover;  
            }
            .topleft1{
            	position:absolute;
            	top:180px;
            	left:600px;
            	color:red;
            }
            .topleft{
            	position:relative;
            	top:330px;
            	left:490px;
            	color:orangered;
            	font-size:30px; 
            }
            .topleft2{
            	position:relative;
            	top:330px;
            	left:590px;
            }
            .topleft3{
            	position:relative;
            	top:330px;
            	left:598px;
            }
            .login{
            	position:relative;
            	top:450px;
            	left:710px;
            }
      </style>
      
      <body>
        <?php
           if (isset($_POST['submit']))   
            echo "GeeksforGeeks"; 
           if(isset($_POST['room'])){
            $room = $_POST['room'];
            $conn = new mysqli('localhost','root','','po');
            if($conn->connect_error)
            {
              die('Connection Failed : '.$conn->connect_error);
            }
            else
            {
                $q="select * from details where room = '$room' ";
                $result = mysqli_query($conn,$q);
                $num = mysqli_num_rows($result);
                if($num == 1)
                { 
                  echo "<script type='text/javascript'>jsFunction();</script>";
                  $sql="delete from details where room = '$room'";
                  if(mysqli_query($conn, $sql))
                  header('Location: laundry.html');
                }
                else{
                   echo "YOU ENTERED WRONG ROOM NO.";
                } 
            } 
     }
        ?> 
      	  <h1 class="topleft1"><u>DELETE ORDER</u></h1>
      	  <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "POST">
              <label for="room" class="topleft">Enter Room No.:</label>
              <input type="text" id="room" name="room" class="topleft2" required><br><br>
              <input type="submit" value="Delete" class="login">
      	  </form>
      </body>	  

  </html>    