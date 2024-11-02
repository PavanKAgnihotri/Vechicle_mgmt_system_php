<?php extract($_GET);
?>

<html>
    <head>
    <style>
        body{
        background:url(pictures/backgnd.jpg);
        background-size: cover;
        background-attachment: fixed;    
        }
      .logoutLblPos{
      position:relative;
      right:10px;
      }
.button1 {  
    background-color: green;
    color: white; 
    border: 2px solid #008CBA;
    height:50px;
    width:200px;
    font-size: 16px;
}
.button2 {  
    background-color: red;
    color: white; 
    border: 2px solid #008CBA;
    height:50px;
    width:200px;
    font-size: 16px;
}
.button1:hover {
    color: black;
    background-color: white;
}
.button2:hover {
    color: black;
    background-color: white;
}
img{
    box-shadow: 0pt 0pt 3pt black;
}
    

.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev {
  cursor: pointer;
  position: absolute;
  top: 50%;
  left: 6%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}
.next{
     cursor: pointer;
  position: absolute;
  top: 50%;
  left:90%;
  width: 1%;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}
/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}


/* Number text (1/2 etc) */
.numbertext {
  color: white;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
  left: 10%;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}   
        </style>
        <title>manual_details</title>
    </head>
    <body><br>
          <h1 style="color:red; text-align:center;"><u>VEHICLE INFORMATION</u></h1> 
        
              <?php
                       $found=false;
                       $conn = new mysqli("localhost", "root", "", "vehicle_mgmt");
                       if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM vehicles where name='$name' ";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {  
                            // output data of each row
                            while($row = $result->fetch_assoc())
                            {   
                                if ($row["stock"] > 0) 
                                {
                                   $found=true;
                                //cookies
                                 setcookie( 'v_type' , $row['type'] );
                                 setcookie( 'v_brand' , $row['brand'] );
                                 setcookie( 'v_name' , $row['name'] );
                                 setcookie( 'v_price' , $row['price'] );
                 ?> 
         
               <h2 style="color:purple; text-align:center;">Selected Vehicle Detail:</h2> <br>
               
               <center> 
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 2</div>
 <img src="<?php echo $row["link"]; ?>" height="350" width="800">
 
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 2</div>
  <img src="<?php echo $row["link1"]; ?>" height="350" width="800">
</div>
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  
</div>


               </center>
               
               <div style="margin:1% 20% 0% 20%; text-align:center; border:1pt solid gray;border-radius:5%; box-shadow: 0pt 0pt 3pt black;">
               <h3 style="color:black;">Vehicle Brand: <?php echo  $row["brand"]; ?> </h3> <hr>
               <h3 style="color:black; ">Vehicle Name: <?php echo  $row["name"]; ?>  </h3> <hr>
               <h3 style="color:black; ">Engine Capacity: <?php echo  $row["enginecapacity"]; ?></h3> <hr>
               <h3 style="color:black; ">Mileage: <?php echo  $row["milleage"]; ?> </h3> <hr>
               <h3 style="color:black; ">Top Speed: <?php echo  $row["topspeed"]; ?>  </h3> <hr>
               <h3 style="color:black; ">Kerb Weight: <?php echo  $row["kerbweight"]; ?> </h3> <hr>
               <h3 style="color:black; ">Power: <?php echo  $row["power"]; ?>  </h3> <hr>
               <h3 style="color:black; ">Fuel Capacity: <?php echo  $row["fuelcapacity"]; ?>  </h3> <hr>
               <h3 style="color:black ;">Price: <?php echo 'Rs ' .$row["price"]; ?>  </h3> 
               </div>
               <br>
                <form align="center"  method="post" action="payment.php">
            
                 <label class="logoutLblPos">
                     
                  <button class="button1">CONTINUE</button>
                 </label>
                </form> 
              <?php
                    }}}
                    if(!$found) {
                        echo '<h2 style="color:black;text-align:center;"> Sorry, No Vehicles Found!!! </h2> ';
                    }
                        $conn->close();
                ?> 
            
                   <form align="center"  method="post" action="homepage_user.php">
                   <label class="logoutLblPos">
                  <button class="button2">BACK</button>
                  </label>
                  </form>
               <br><br><br>
              
      
       <script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
    </body>
</html>
