<!Doctype html>
 
  <html>
     
      <head>
          <title>PROJECT</title>
          <script type="text/javascript">
           function jsFunction(){
             alert('DATA NOT FOUND');
            }
          </script>
      </head>

      <style>
            body{
              background-image:url("so.jpg");  
              background-attachment: fixed;
              background-size: cover;
            }
            .topleft1{
              position:absolute;
              top:100px;
              left:650px;
              color:yellow;
            }
            .topleft{
              position:relative;
              top:230px;
              left:500px;
              color:darkgreen;
              font-size:30px; 
            }
            .topleft2{
              position:relative;
              top:230px;
              left:675px;
            }
            .topleft3{
              position:absolute;
              top:365px;
              left:875px;
            }
            .topleft4{
              position:absolute;
              top:360px;
              left:500px;
              color:darkgreen;
              font-size:30px; 
            }
            .gar{
              position:absolute;
              top:430px;
              left:875px; 
            }
            .garl{
              position:absolute;
              top:425px;
              left:490px;
              color:darkgreen;
              font-size:30px; 
            }
            .cl{
              position:absolute;
              top:500px;
              left:875px;
            }
            .cll{
              position:absolute;
              top:489px;
              left:515px;
              color:darkgreen;
              font-size:30px; 
            }
            .wl{
              position:absolute;
              top:563px;
              left:875px;
            }
            .wll{
              position:absolute;
              top:552px;
              left:510px;
              color:darkgreen;
              font-size:30px; 
            }
            .char{
              position:absolute;
              top:629px;
              left:875px;
            }
            .charl{
              position:absolute;
              top:617px;
              left:510px;
              color:darkgreen;
              font-size:30px; 
            }
            .clb{
                position:absolute;
              top:690px;
              left:750px; 
            }
            .cft{
             position:absolute;
              top:310px;
              left:740px; 
            }
      </style>
      
      <body>
        <?php
          $gname="";
          $garm="";
          $cloth="";
          $wash="";
          $char="";
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
            $sql = "SELECT * FROM details where room='$room'";
           $result = mysqli_query($conn,$sql);
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
               }
          
            $conn->close();  
        }
      }

        ?>
          <h1 class="topleft1"><u>SEARCH ORDER</u></h1>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
              <label for="room" class="topleft">Enter Room no.</label>
              <input type="text" id="room" name="room" class="topleft2" required>
              
              <input type="submit" class="cft" value="Fetch Order">

              <label for="gname" class="topleft4">Guest Name</label>
              <input type="text" id="gname" name="gname" class="topleft3" value="<?php echo $gname;?>" readonly="readonly">

              <label for="garm" class="garl">No. of Garments</label>
              <input type="text" id="garm" name="garm" class="gar" value="<?php echo $garm;?>" readonly="readonly">

              <label for="cloth" class="cll">Cloth Type</label>
              <input type="text" id="cloth" name="cloth" class="cl" value="<?php echo $cloth;?>" readonly="readonly">

              <label for="wash" class="wll">Wash Type</label>
              <input type="text" id="wash" name="wash" class="wl" value="<?php echo $wash;?>" readonly="readonly">

              <label for="char" class="charl">Charges</label>
              <input type="text" id="char" name="char" class="char" value="<?php echo $char;?>" readonly="readonly">
          </form>
          <a href="laundry.html"><button class="clb">BACK</button></a>
      </body>   

  </html>    