<html>
    <head>
        <link rel="stylesheet" href="admin.css">
        <title> Main_page_ADMIN </title>
        <style>
            img:hover{
                height: 200px;
                width:  250px;
                box-shadow: 3px 0px 5px black ;
            }
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
       <form method="post" action="homepage_admin4a.php"> <button class="tablinks2" onclick="opentype2(event, 'outofstock')" ><p>OUT OF STOCK</p></button> </form>
       <button class="tablinks2" onclick="opentype2(event, 'stockdetails')" id="defaultOpen2"> <p>STOCK DETAILS</p></button>
  
 </div>     
    
<div id="stockdetails" class="tabcontent2">  
   <h2 style="color:green; position:relative;left:30%;">Vehicles Stock Details </h2>
   <table id="marks">
                <tr>
                 <th> Image </th>
                 <th> Type </th>
                 <th> Brand</th>
                 <th> Name</th>  
                 <th> Stock Available</th>                 
                </tr> 
               <?php    $details=false; 
                        $conn0 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                        // Check connection
                        if ($conn0->connect_error) {
                            die("Connection failed: " . $conn0->connect_error);
                        }

                        $sql0 = "SELECT * FROM vehicles where stock>0";
                        $result0 = $conn0->query($sql0);
                        while($row = $result0->fetch_assoc()) 
                        {    $details=true; 
                         ?>
                
                            <tr>
                             <td> <img src="<?php echo $row["link"]; ?>" height="100" width="150"> </td>
                             <td><h4 style="color:black;"><?php echo $row['type']; ?>  </h4> </td>
                             <td><h4 style="color:black;"><?php echo $row['brand']; ?>  </h4> </td>
                             <td><h4 style="color:black;"><?php echo $row['name']; ?>   </h4> </td>   
                             <td><h4 style="color:black;"><?php echo $row['stock']; ?>   </h4> </td>
                            </tr>     
                            
                <?php   } 
                        
                        if($details==false)
                            echo '<h3 style="color:red;"> No Stocks Available!!! </h3> '; 
                        $conn0->close(); 
                ?>
               
   </table>  <br><br> 
   
   
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

          
          