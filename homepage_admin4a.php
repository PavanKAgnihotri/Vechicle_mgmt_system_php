<?php extract($_GET);
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
<form method="post" action="homepage_admin3.php"><button class="tablink" onclick="openPage('update', this, 'blue')">Update Vehicle Details</button></form>
            <button class="tablink" onclick="openPage('stock', this, 'orange')" id="defaultOpen" >Stock Management</button>
<form method="post" action="homepage_admin5.php"><button class="tablink" onclick="openPage('transaction', this, 'violet')">Transaction Details</button></form>

 <!--Stock management -->
 
<div id="stock" class="tabcontent">
  
  <div class="tab1">
         <button class="tablinks2" onclick="opentype2(event, 'outofstock')" id="defaultOpen2"><p>OUT OF STOCK</p></button>
        <form method="post" action="homepage_admin4b.php"> <button class="tablinks2" onclick="opentype2(event, 'stockdetails')"><p>STOCK DETAILS</p></button> </form>
  
 </div>     
    
<div id="outofstock" class="tabcontent2">  
   <h2 style="color:green; position:relative;left:22%;">Out Of Stock Vehicles Displayed Below </h2><br>
   
            <table id="marks">
                <tr>
                 <th> Type </th>
                 <th> Brand </th>
                 <th> Name</th>
                 <th> Stock Quantity</th>   
                </tr> 
               <?php    $outofstock=false;
                        $conn9 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                        // Check connection
                        if ($conn9->connect_error) {
                            die("Connection failed: " . $conn9->connect_error);
                        }

                        $sql9 = "SELECT * FROM vehicles where stock<='0'";
                        $result9 = $conn9->query($sql9);
                        while($row = $result9->fetch_assoc()) 
                        {    $outofstock=true; 
                ?>
                 
                            <tr>
                   
                             <td><h4 style="color:black;"><?php echo $row['type']; ?>  </h4> </td>
                             <td><h4 style="color:black;"><?php echo $row['brand']; ?>  </h4> </td>
                             <td><h4 style="color:black;"><?php echo $row['name']; ?>  </h4> </td>
                             <td><form method="get">
                                     <h4 style="color:black;"><input type='number' name='updationstock' min="0" max="10" value="<?php echo $row['stock'];?>"> &nbsp;
                                 <button class="button button2" name="vehiclename" value="<?php echo $row["name"]; ?> "> Update </button>
                                 </h4> 
                                 </form>
                             </td>
                           
                            </tr>  
               
                <?php   } 
                        
                      if($outofstock==false)
                            echo '<h3 style="color:red;"> No Out of Stock Vehicles Present!!! </h3> ';                    
                     if(isset($vehiclename))
                     {                            
                        $sql2 = "update vehicles set stock='$updationstock' where name='$vehiclename'";
                        if ($conn9->query($sql2) === TRUE) { ?>
                         <script type="text/javascript">
                                        window.location.href = 'homepage_admin4a.php';
                         </script> <?php 
                     }
                      else {  
                        echo '<p style="color:red;padding:8pt;"> Error in Stock Updation !!! </p> '; }

                    } 
                      $conn9->close(); 
                ?>
           </table>
<br><br> 
   
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
 
<!--vertical for four wheeler menu -->
function opentype2(evt, cityName) {
    var i, tabcontent1, tablinks;
    tabcontent1 = document.getElementsByClassName("tabcontent2");
    for (i = 0; i < tabcontent1.length; i++) {
        tabcontent1[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks2");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen2").click();

</script>  


    </body> 
    
</html>

          
          