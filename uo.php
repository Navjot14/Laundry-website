<!Doctype html>
 
  <html>
     
      <head>
          <title>PROJECT</title>
          <script type="text/javascript">
           function jsFunction(){
             alert('DATA NOT FOUND');
            }
            function osFunction(){
             alert('UPDATION SUCCESSFUL');
            }
          </script>
      </head>

      <style>
            body{
              background-image:url("upo.jpg");  
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
              color:red;
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
              color:red;
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
              color:red;
              font-size:30px; 
            }
            .cl{
              position:absolute;
              top:500px;
              left:875px;
              font-size:23px;
            }
            .cll{
              position:absolute;
              top:489px;
              left:515px;
              color:red;
              font-size:30px; 
            }
            .wl{
              position:absolute;
              top:563px;
              left:875px;
              font-size:23px;
            }
            .wll{
              position:absolute;
              top:552px;
              left:510px;
              color:red;
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
              color:red;
              font-size:30px; 
            }
            .clb{
                position:absolute;
              top:690px;
              left:900px; 
            }
            .upo{
                position:absolute;
              top:690px;
              left:600px; 
            }
            .cft{
             position:absolute;
              top:310px;
              left:740px; 
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
           if(isset($_POST["fet"]))
      {  

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
}
else if(isset($_POST["upd"]))
{
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
        $q="UPDATE details SET garm='$garm' , cloth='$cloth' , wash='$wash' WHERE room='$room';";
        $result = mysqli_query($conn,$q);
        echo "<script type='text/javascript'>osFunction();</script>";
        $conn->close();   
      }
  }
  else
    echo "connection failed";
}

        ?>
          <h1 class="topleft1"><u>UPDATE ORDER</u></h1>
          <form method="POST">
              <label for="room" class="topleft">Enter Room no.</label>
              <input type="text" id="room" name="room" class="topleft2" value="<?php echo $room;?>" required>
              
               <input type="submit" class="cft" value="Fetch Order" name="fet" > 

              <label for="gname" class="topleft4">Guest Name</label>
              <input type="text" id="gname" name="gname" class="topleft3" value="<?php echo $gname;?>" readonly="readonly">

              <label for="garm" class="garl">No. of Garments</label>
              <input type="text" id="garm" name="garm" class="gar">

              <label for="cloth" class="cll">Cloth Type</label>
              <select id="cloth" name="cloth" class="cl">
              <option value="none">None</option>
              <option value="shirts">Shirts/T-Shirts</option>
              <option value="pants">Pants/Jeans</option>
              <option value="suits">Suits</option>
              <option value="sarees">Sarees</option>
              </select>  

              <label for="wash" class="wll">Wash Type</label>
              <select id="wash" name="wash" class="wl">
              <option value="none">None</option>
              <option value="bleach">Bleach</option>
              <option value="dyes">Dyes</option>
              <option value="hot">Hot Wash</option>
              <option value="dry">Dry Clean</option>
              </select>

              <label for="char" class="charl">Charges</label>
              <input type="text" id="char" name="char" class="char" value="<?php echo $char;?>" readonly="readonly">
              <input type="submit" class="upo" value="UPDATE ORDER" onclick="return myFunction();"  name="upd">              
          </form>
          <a href="laundry.html"><button class="clb">BACK</button></a>
          <script> 
            function myFunction() { 
        
          var gar = document.getElementById("garm").value;
          var cl = document.getElementById("cloth").selectedIndex;
          var ws = document.getElementById("wash").selectedIndex;
          var ct = document.getElementById("cloth").options;
          var wt = document.getElementById("wash").options;
          if(cl==0)
          {
            alert("You have not selected cloth type");
            return false;
          }
          if(ws==0)
          {
            alert("You have not selected wash type");
            return false;
          }
          var sum=0;
          var wc=0;
          var cc=0;
          var pc;
          var pw;
          if(cl==1 && ws==1)
            {sum+=200;cc=200;pc="Shirts";pw="Bleach";}
          else if(cl==2 && ws==1)
            {sum+=250;cc=250;pc="Pants";pw="Bleach";}
          else if(cl==3 && ws==1)
            {sum+=300;cc=300;pc="Suits";pw="Bleach";}
          else if(cl==4 && ws==1)
            {sum+=350;cc=350;pc="Sarees";pw="Bleach";}
        
         if(cl==1 && ws==2)
            {sum+=210;cc=210;pc="Shirts";pw="Dyes";}
          else if(cl==2 && ws==2)
            {sum+=260;cc=260;pc="Pants";pw="Dyes";}
          else if(cl==3 && ws==2)
            {sum+=310;cc=310;pc="Suits";pw="Dyes";}
          else if(cl==4 && ws==2)
            {sum+=360;cc=360;pc="Sarees";pw="Dyes";}

         if(cl==1 && ws==3)
            {sum+=220;cc=220;pc="Shirts";pw="Hot wash";}
          else if(cl==2 && ws==3)
            {sum+=270;cc=270;pc="Pants";pw="Hot wash";}
          else if(cl==3 && ws==3)
            {sum+=320;cc=320;pc="Suits";pw="Hot wash";}
          else if(cl==4 && ws==3)
            {sum+=370;cc=370;pc="Sarees";pw="Hot wash";}            

          if(cl==1 && ws==4)
            {sum+=230;cc=230;pc="Shirts";pw="Dry clean";}
          else if(cl==2 && ws==4)
            {sum+=280;cc=280;pc="Pants";pw="Dry clean";}
          else if(cl==3 && ws==4)
            {sum+=330;cc=330;pc="Suits";pw="Dry clean";}
          else if(cl==4 && ws==4)
            {sum+=380;cc=380;pc="Sarees";pw="Dry clean";}
          
          sum*=gar;
          window.alert("YOU SELECTED CLOTH TYPE "+pc+" and  WASH TYPE "+pw+" = "+cc+" No. of garments = "+gar);
          window.alert("NEW CHARGES = "+sum);
          return true;
        } 
        </script> 
        <script> 
            if (isset($_POST['upd'])) { 
                echo "GeeksforGeeks"; 
            } 
        </script> 
      </body>   

  </html>    