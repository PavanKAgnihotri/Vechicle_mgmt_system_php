<?php extract($_POST);
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
       
     <button class="tablink" onclick="openPage('add', this, 'red')" id="defaultOpen">Add Vehicle</button>
<form method="post" action="homepage_admin2.php"><button class="tablink" onclick="openPage('delete', this, 'green')" >Delete Vehicle</button></form>
<form method="post" action="homepage_admin3.php"><button class="tablink" onclick="openPage('update', this, 'blue')">Update Vehicle Details</button></form>
<form method="post" action="homepage_admin4a.php"><button class="tablink" onclick="openPage('stock', this, 'orange')">Stock Management</button></form>
<form method="post" action="homepage_admin5.php"><button class="tablink" onclick="openPage('transaction', this, 'violet')">Transaction Details</button></form>
 
<!--ADD VEHICLE PAGE -->


<div id="add" class="tabcontent">
         
       <div class="tab1">
        <form method="post" action="homepage_admin1a.php"> <button class="tablinks1" onclick="opentype1(event, '2wheel')" > <p>Two Wheelers</p></button></form>
        <form method="post" action="homepage_admin1b.php"> <button class="tablinks1" onclick="opentype1(event, '3wheel')"><p>Three Wheelers</p></button></form>
       <button class="tablinks1" onclick="opentype1(event, '4wheel')" id="defaultOpen1"><p>Four Wheelers</p></button>
    </div>     
    

<div id="4wheel" class="tabcontent1">  
    <h2 style="color:green; position:relative;left:20%;">Enter the Details for Four Wheeler Vehicles </h2><br>
    
    <form method="post">
       <p style="color:blue;">Enter Vehicle Brand :-</p> 
  <input type="text"  placeholder="Vehicle Brand..." name="vbrand" required>
  <br>
<p style="color:blue;">Enter Vehicle Name :-</p> 
  <input type="text"  placeholder="Vehicle Name..." name="vname" required>
  <br>
  <p style="color:blue;">Enter Vehicle Engine Capacity :-</p> 
  <input type="text"  placeholder="Engine Capacity in cc..." name="engcc" required>
  <br>
  <p style="color:blue;">Enter Vehicle Mileage :-</p> 
  <input type="text"  placeholder="Vehicle Mileage in kmpl..." name="vmil" required>
  <br>
  <p style="color:blue;">Enter Vehicle Top Speed :-</p> 
  <input type="text"  placeholder="Vehicle Top speed in kmph..." name="vspeed" required>
  <br>
  <p style="color:blue;">Enter Vehicle Kerb Weight :-</p> 
  <input type="text"  placeholder="Vehicle Kerb Weight in kgs..." name="vweight" required>
  <br>
  <p style="color:blue;">Enter Vehicle Power :-</p> 
  <input type="text"  placeholder="Vehicle Power..." name="vpower" required>
  <br>
  <p style="color:blue;">Enter Vehicle Fuel Tank Capacity  :-</p> 
  <input type="text"  placeholder="Vehicle Tank Capacity in L..." name="vlt" required>
  <br>
  <p style="color:blue;">Enter No of Vehicle Stocks :-</p> 
  <input type="number"  placeholder="Vehicle Stocks..." name="vstock" required>
  <br>
  <p style="color:blue;">Enter Vehicle Price :-</p> 
 <p style="color:black;">Rs <input type="text"  placeholder="Vehicle Price..." name="vprice" style="width:47.5%;" required></p>

  <p style="color:blue;">Enter Vehicle Image Link :-</p> 
  <input type="text"  placeholder="Image Link..." name="vlink" required>
  <br>
   <br>
  <input class="button" type="submit" name="add4wheel" value="Add Vehicle">
 
   </form>
     <?php
            
            // FOR REGISTERED
            if(isset($add4wheel))
            {    
                $conn = new mysqli("localhost", "root", "", "vehicle_mgmt");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " .$conn->connect_error);
                }
            $sql2 = "INSERT INTO vehicles VALUES('four wheeler','$vbrand','$vname','$engcc','$vmil','$vspeed','$vweight','$vpower','$vlt','$vprice','$vlink',' ','$vstock');";
            if ($conn->query($sql2) === TRUE) {
                echo '<p style="color:green;padding:10pt;">Four Wheeler Added Successfully !!! </p> '; 
            }
                else {  echo '<p style="color:red;padding:10pt;"> Error in Inserting!!! </p> '. $conn->error; }
             $conn->close();
            }   
       ?>
</div>
   
   
</div>
      
    <!--END OF HOME --> 

   

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
<!--vertical for two wheeler menu -->
function opentype1(evt, cityName) {
    var i, tabcontent1, tablinks;
    tabcontent1 = document.getElementsByClassName("tabcontent1");
    for (i = 0; i < tabcontent1.length; i++) {
        tabcontent1[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks1");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen1").click();


</script>  


    </body> 
    
</html>

          
          