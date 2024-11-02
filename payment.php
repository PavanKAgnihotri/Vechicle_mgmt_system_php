<?php extract($_POST);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  background:url(pictures/backgnd.jpg);
  background-size: cover;
  background-attachment: fixed;   
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}
* {
  box-sizing: border-box;
}
.row {
  display: -ms-flexbox; 
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
}
.col-25 {
  -ms-flex: 25%; 
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%;
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 5px 5px 5px;
  border: 1px solid lightgrey;
  border-radius: 3px;
  width:80%;
  margin-left:9%;
  
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
input[type=number] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
    width:150px;
    height:55px;
    position:relative;
    left:45%;
    font-size: 20px;
}

.button3:hover {
    background-color: #4CAF50;
    color: white;
}

/*logout*/
.logoutLblPos{

   position:relative;
   right:20px;
   top:10px;
}

.custom-select {
  position: relative;
  font-family: Arial;
    color: black;
  height:35px;width:100pt;
  border: 1px solid black;
  background: rgba(229,249,249,0.7);
  font-size: 15px;
 
}

.custom-select:hover {
  background-color: rgba(0, 0, 0, 0.1);
}

</style>

</head>
<body>
    <?php $t_id=rand(999,10000);  setcookie('t_id', $t_id); 
                $cust_name=$_COOKIE['user_name']; date_default_timezone_set('asia/kolkata');   
                $v_date=date("d/m/Y")." (".date("H:i:s").") " ;  setcookie('v_date', $v_date);
                $v_type=$_COOKIE['v_type'];  
                $v_brand=$_COOKIE['v_brand'];   
                $v_name=$_COOKIE['v_name'];  
                $v_price=$_COOKIE['v_price']; 
     ?>
  
<h1 align="center" style="color:green;"> PAYMENT PORTAL</h1>
<div class="row">
  <div class="col-75">
    <div class="container">

        <form method="post" >

          <div class="col-50">
            <h3>Payment</h3>
             <p style="color:black;">Select Payment Type :-   <select class="custom-select" name="type">
                <option>Credit Card</option>
                <option>Debit Card</option>
                <option>Paytm Card</option> 
                </select></p> 
            <label for="cname">Name on Card</label>
            <input type="text"  name="cardname" required placeholder="Name">
            <label for="ccnum">Card number</label>
            <input type="text"  name="cardnumber" required placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text"  name="expmonth" required placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="number"  name="expyear" required placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="number" name="cvv" required placeholder="122">
              </div>
                 <div class="col-50">
  
                                    <label> <b>Total Cost:Rs <?php echo($_COOKIE['v_price']);?>
                                       
                    </b></label>
              </div>
            </div>
          </div>
          
              <label class="logoutLblPos">
                   <label class="buttonstyl" >
                       <input type="submit" class="button3" name="pay" value="PAY">
                       
                   </label>
          </label>
      <a href="homepage_user.php">Click here to terminate</a>
      </form>
  <?php  
           if(isset($pay))
            {
              
                $conn = new mysqli("localhost", "root", "", "vehicle_mgmt");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " .$conn->connect_error);
                }
                $sql = "INSERT INTO transaction VALUES('$t_id','$cust_name','$v_date','$v_type','$v_brand','$v_name','$v_price');";
                if ($conn->query($sql) === TRUE)
                {
                            echo '<p style="color:green;padding:8pt;">Booking Successfull !!! </p> ';
                            //stocks updation
                            $sql1 = "Select stock from vehicles where type='$v_type' and brand='$v_brand' and name='$v_name' ";
                            $result1 = $conn->query($sql1);
                              while($row = $result1->fetch_assoc()) 
                              {
                                  $new_stock=$row['stock'];
                              }                             
                              $new_stock=$new_stock-1;                            
                              $sql2 = "update vehicles set stock='$new_stock' where type='$v_type' and brand='$v_brand' and name='$v_name' ";
                              if ($conn->query($sql2) === TRUE)
                              {                              
                                    echo '<p style="color:green;padding:8pt;">Stock Updated!!! </p> '; 
                                    ?>  <script type="text/javascript">
                                        window.location.href = 'success.php';
                                         </script>    
                                    <?php    
                               }
                              else {  echo '<p style="color:red;padding:8pt;">Error in Stock Updation!!! </p> '; }
                 }
                else {  echo '<p style="color:red;padding:8pt;"> Error in Booking !!! </p> ';  } 
                
                $conn->close();                  
           }
         ?>                              
 </div>
  </div>
   </div>


</body>
</html>
