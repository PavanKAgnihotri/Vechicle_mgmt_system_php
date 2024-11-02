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
       
<form method="post" action="homepage_admin1a.php"><button class="tablink" onclick="openPage('add', this, 'red')" >Add Vehicle</button></form>
                <button class="tablink" onclick="openPage('delete', this, 'green')"id="defaultOpen" >Delete Vehicle</button>
<form method="post" action="homepage_admin3.php"><button class="tablink" onclick="openPage('update', this, 'blue')">Update Vehicle Details</button></form>
<form method="post" action="homepage_admin4a.php"><button class="tablink" onclick="openPage('stock', this, 'orange')">Stock Management</button></form>
<form method="post" action="homepage_admin5.php"><button class="tablink" onclick="openPage('transaction', this, 'violet')">Transaction Details</button></form>
 

 <!--DLELTE VEHICLE -->
 
 
<div id="delete" class="tabcontent">
       <div class="blck">
           <h2 style="color:green; text-align:center;"> Delete Vehicle Record </h2><br>
  
<form method="post">
    <p style="color:blue;">Select Vehicle Type :-   <select class="custom-select" name="type">
    <option>Two Wheeler</option>
    <option>Three Wheeler</option>
    <option>Four Wheeler</option> 
    </select></p> 
  
  <p style="color:blue;">Enter Vehicle Name :-</p> 
  <input type="text" placeholder="Vehicle Name..." name="vname" required>
  <br>

  <br>
  <input class="button" type="submit" name="deletev" value="Delete">
  <br>
</form>
        <?php
            
            // FOR REGISTERED
            if(isset($deletev))
            {    
                $conn = new mysqli("localhost", "root", "", "vehicle_mgmt");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " .$conn->connect_error);
                }
            $sql = "delete from vehicles where type='$type' and name='$vname' ";       
            if ($conn->query($sql)==TRUE) {
                echo '<p style="color:green;padding:10pt;"> Vehicle Deleted Successfully!!! </p> '; 
            }
                else {  echo '<p style="color:red;padding:10pt;"> Error in Deleting!!! </p>'. $conn->error; }
             $conn->close();
            }   
       ?>    
</div>
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

          
          