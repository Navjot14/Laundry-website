<!Doctype html>
 
  <html>
     
      <head>
      	  <title>PROJECT</title>
      </head>

      <style>
            body{
            	background-image:url("disp.jpg");  
              background-attachment: fixed;
              background-size: cover;
            }
            .heading{
              position:absolute;
              top:100px;
              left:650px;
              color:red;
            }
            .ro{
             position:absolute;
              top:245px;
              left:500px;
              color:deeppink;
              font-size:30px; 
            }
            .rot{
              position:absolute;
              top:250px;
              left:850px;
            }
            table, th, td {
                 margin:400px 0 0 250px;    
                 border: 2px solid black;
                 border-collapse: collapse;
                 padding: 20px;
               }
               th{
                color:indigo;
                font-size: 20px;
               }
               td{
                  color:maroon;
                font-size: 20px;
                text-align: center;
               }
            .di{
             position:absolute;
              top:600px;
              left:550px; 
            }
            .bk{
              position:absolute;
              top:600px;
              left:850px;
            }
      </style>
      <body>
      <?php
      $room="";
      $gname="";
      $garm="";
      $cloth="";
      $wash="";
      $char="";
       if(isset($_POST["display"])){
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
        if( $num==0 ) {
               echo "<script type='text/javascript'>jsFunction();</script>";
            }
       while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $gname=$row['gname'];
                $garm=$row['garm'];
                $cloth=$row['cloth'];
                $wash=$row['wash'];
               $sum=0;
               if($cloth=="shirts" && $wash=="bleach")
               $sum+=200;
               else if($cloth=="pants" && $wash=="bleach")
               $sum+=250;
               else if($cloth=="suits" && $wash=="bleach")
               $sum+=300;
               else if($cloth=="sarees" && $wash=="bleach")
               $sum+=350;
        
               if($cloth=="shirts" && $wash=="dyes")
               $sum+=210;
               else if($cloth=="pants" && $wash=="dyes")
               $sum+=260;
               else if($cloth=="suits" && $wash=="dyes")
               $sum+=310;
               else if($cloth=="sarees" && $wash=="dyes")
               $sum+=360;

               if($cloth=="shirts" && $wash=="hot")
               $sum+=220;
               else if($cloth=="pants" && $wash=="hot")
               $sum+=270;
               else if($cloth=="suits" && $wash=="hot")
               $sum+=320;
               else if($cloth=="sarees" && $wash=="hot")
               $sum+=370;

               if($cloth=="shirts" && $wash=="dry")
               $sum+=220;
               else if($cloth=="pants" && $wash=="dry")
               $sum+=270;
               else if($cloth=="suits" && $wash=="dry")
               $sum+=320;
               else if($cloth=="sarees" && $wash=="dry")
               $sum+=370;
          
               $sum*=$garm;
               $char=$sum;
               if($cloth=="shirts")
                $cloth="SHIRTS/T-SHIRTS";
               else if($cloth=="pants")
                $cloth="PANTS/JEANS";
               else if($cloth=="suits")
                $cloth="SUITS";
               else if($cloth=="sarees")
                $cloth="SAREES";
               if($wash=="bleach")
                $wash="BLEACH";
               else if($wash=="dyes")
                $wash="DYES";
               else if($wash=="hot")
                $wash="HOT WASH";
               else if($wash=="dry")
                $wash="DRY CLEAN";
               }
          
            $conn->close();  
    }
  }
       else
       echo "connection failed";
    }
?>
      	  <h1 class="heading"><u>DISPLAY ORDER</u></h1>
      	   <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <label for="room" class="ro">Enter Room no.</label>
              <input type="text" id="room" name="room" class="rot" required>
              <table style="width:70%">
            <tr>
              <th>GUEST NAME</th>
              <th>ROOM NO.</th>
              <th>NO. OF GARMENTS</th>
              <th>CLOTH TYPE</th>
              <th>WASH TYPE</th>
              <th>CHARGES</th>
            </tr>
            <tr>
              <td><?php echo $gname;?></td>
              <td><?php echo $room;?></td>
              <td><?php echo $garm;?></td>
              <td><?php echo $cloth;?></td>
              <td><?php echo $wash;?></td>
              <td><?php echo $char;?></td>
            </tr> 
          </table>
          <input type="submit" value="DISPLAY" class="di" name="display">
            </form>
           <a href="laundry.html"><button class="bk">BACK</button></a>
          <script> 
            if (isset($_POST['submit'])) { 
                echo "GeeksforGeeks"; 
            } 
        </script> 
      </body>	  

  </html>    