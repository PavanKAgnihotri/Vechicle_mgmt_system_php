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
<form method="post" action="homepage_admin4a.php"><button class="tablink" onclick="openPage('stock', this, 'orange')" >Stock Management</button></form>
<button class="tablink" onclick="openPage('transaction', this, 'violet')" id="defaultOpen">Transaction Details</button>
 

<!-- TRANSACTION DETAILS-->

<div id="transaction" class="tabcontent">
    
   <div class="blck"> 
  <br><h2 style="color:green; position:relative;left:41%;">TRANSACTION DETAILS </h2><br>
   <table id="marks">
                <tr>
                 <th> Transaction Id </th>
                 <th> Customer Name </th>
                 <th>Date of Purchase</th>
                 <th> Vehicle Type</th>  
                 <th> Brand </th>
                 <th> Vehicle Name</th>  
                 <th> Price</th> 
                </tr> 
               <?php    $transact=false;
                        $conn9 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                        // Check connection
                        if ($conn9->connect_error) {
                            die("Connection failed: " . $conn9->connect_error);
                        }

                        $sql9 = "SELECT * FROM transaction";
                        $result9 = $conn9->query($sql9);
                        while($row = $result9->fetch_assoc()) 
                        {    $transact=true; 
                ?>
                
                            <tr>
                             <td><h4 style="color:black;"><?php echo $row['t_id']; ?>  </h4> </td>
                             <td><h4 style="color:black;"><?php echo $row['customer_name']; ?>  </h4> </td>
                             <td><h4 style="color:black;"><?php echo $row['date_purchase']; ?>  </h4> </td>
                             <td><h4 style="color:black;"><?php echo $row['type']; ?>  </h4> </td>
                             <td><h4 style="color:black;"><?php echo $row['brand']; ?>  </h4> </td>
                             <td><h4 style="color:black;"><?php echo $row['v_name']; ?>   </h4> </td>   
                             <td><h4 style="color:black;"><?php echo "Rs ".$row['price']; ?>   </h4> </td>
                            </tr>     
                            
                <?php   } 
                        
                        if($transact==false)
                            echo '<h3 style="color:red;"> No Transactions Made!!! </h3> '; 
                        $conn9->close(); 
                ?>
               
   </table>  <br>  
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

          
          