<?php extract($_POST);extract($_GET);
?>
<html>
    <head>
        <link rel="stylesheet" href="admin.css">
        <title> Main_page_ADMIN </title>
        <style>
            body{
                background:url(pictures/backgnd.jpg);
                background-size: cover;
                background-attachment: fixed;    
                }   
        </style>
 </head>
    <!--BODY OF HTML-->
    <body>
               
     <!--LOgOUT -->
          <form align="right" name="form1" method="post" action="homepage.php">
            <span style="float:right;"><button class="button button2">LOG OUT</button> </span> 
          </form>
      <h3 style="color:darkorchid;padding-top:10px;padding-left:5px;"> Welcome: <?php echo($_COOKIE['admin_name']);?> [Admin] </h3>
      <h1 style="color:red; position:relative;left:45%;">HOME PAGE </h1>
       
<form method="post" action="homepage_admin1a.php"><button class="tablink" onclick="openPage('add', this, 'red')" >Add Vehicle</button></form>
<form method="post" action="homepage_admin2.php"><button class="tablink" onclick="openPage('delete', this, 'green')" >Delete Vehicle</button></form>
<button class="tablink" onclick="openPage('update', this, 'blue')" id="defaultOpen">Update Vehicle Details</button>
<form method="post" action="homepage_admin4a.php"><button class="tablink" onclick="openPage('stock', this, 'orange')">Stock Management</button></form>
<form method="post" action="homepage_admin5.php"><button class="tablink" onclick="openPage('transaction', this, 'violet')">Transaction Details</button></form>
 

 
 <!--update -->

<div id="update" class="tabcontent">
   <div class="blck"> 
        <br><h2 style="color:green; text-align:center;">Search Vehicle:</h2>
        <form method="get">
       <p style="color:blue;">Enter Vehicle Name :-</p> 
     <input type="text" id="vname" placeholder="Vehicle Name..." name="vehname"  required>
         <br><br>
     <input class="button" type="submit" name="updating" value="Search">
      <br>
   </form>
 </div>
    <hr>
   
   
     <?php
                    $found=false;
                    //FOR LOGIN 
                    if(isset($updating) )
                    {    
                        $conn = new mysqli("localhost", "root", "", "vehicle_mgmt");
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM vehicles where name='$vehname'";
                        $result = $conn->query($sql);

                        while($row = $result->fetch_assoc()) 
                        {
                        $found=true;
          ?>       <div class="blck">
                    <form name="updatingform" method="post">
                          <h2 style="color:blue;text-align:center;">Vehicle Name:<?php echo $row['brand']." ".$row['name']; ?></h2>
                         
                          <p style="color:blue;">Enter Vehicle Engine Capacity :-</p> 
                          <input type="text"  placeholder="Engine Capacity..." name="engcc1" value="<?php echo $row['enginecapacity']; ?>" required>
                          <br>
                          <p style="color:blue;">Enter Vehicle Mileage :-</p> 
                          <input type="text"  placeholder="Vehicle Mileage in kmpl..." name="vmil1" value="<?php echo $row['milleage']; ?>" required>
                          <br>
                          <p style="color:blue;">Enter Vehicle Top Speed :-</p> 
                          <input type="text"  placeholder="Vehicle Top speed in kmph..." name="vspeed1" value="<?php echo $row['topspeed']; ?>" required>
                          <br>
                          <p style="color:blue;">Enter Vehicle Kerb Weight :-</p> 
                          <input type="text"  placeholder="Vehicle Kerb Weight in kgs..." name="vweight1" value="<?php echo $row['kerbweight']; ?>" required>
                          <br>
                          <p style="color:blue;">Enter Vehicle Power :-</p> 
                          <input type="text"  placeholder="Vehicle Power..." name="vpower1" value="<?php echo $row['power']; ?>" required>
                          <br>
                          <p style="color:blue;">Enter Vehicle Fuel Tank Capacity  :-</p> 
                          <input type="text"  placeholder="Vehicle Tank Capacity in L..." name="vlt1" value="<?php echo $row['fuelcapacity']; ?>" required>
                          <br>
                          <p style="color:blue;">Enter Vehicle Price :-</p> 
                          <p style="color:black;">Rs <input type="text"  placeholder="Vehicle Price..." name="vprice1" style="width:48%;" value="<?php echo $row['price']; ?>" required></p>                 
                          <p style="color:blue;">Enter Vehicle Image Link :-</p> 
                          <input type="text"  placeholder="Image Link..." name="vlink1" value="<?php echo $row['link']; ?>" required>
                          <br>
                           <br>
                          <input class="button" type="submit" name='newupdate1' value="Update">
                      </form>
          </div> 
                 
                          
                     <?php
                       if(isset($newupdate1)){
                        $vtype1=$row['type'];
                        $vbrand1=$row['brand'];
                        $vname1=$row['name'];
                       
                          $conn1 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                          // Check connection
                          if ($conn1->connect_error) {
                                die("Connection failed: " .$conn1->connect_error);
                            }
                        $sql1 = "update vehicles set enginecapacity='$engcc1',milleage='$vmil1',topspeed='$vspeed1',kerbweight='$vweight1',power='$vpower1' ,fuelcapacity='$vlt1',price='$vprice1',link='$vlink1' where type='$vtype1' and brand='$vbrand1' and name='$vname1' ";
                        if ($conn1->query($sql1) === TRUE) {
                          
                            echo '<p style="color:green;padding:10pt;">Vehicle Updated Added Successfully !!! </p> '; 
                        }
                            else {  echo '<p style="color:red;padding:10pt;"> Error in Inserting!!! </p> '.$conn1->error; }
                         $conn1->close();
                       }    
                                     
                  } 
                        if($found==false)
                            echo '<p style="color:red;"> No Vehicle Found!!! </p> '. $conn->error;; 
                        $conn->close(); 
                    }
                     
      ?>

   
</div>
 

<script>
  <!--horizontal menu(main) -->


function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
document.getElementById("defaultOpen").click();


</script>  


    </body> 
    
</html>

          
          