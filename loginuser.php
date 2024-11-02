<?php extract($_POST);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LOGIN(USER) Page</title>
         <link rel="stylesheet" href="loginstyle.css">
         
    </head>
    <body>
        
        <br><br><br>
        <h1 style="color:orangered; text-shadow: 2px 2px 0px black;"> LOGIN/REGISTER AS USER</h1> <br><br>
          <div class="login-page">
   <div class="form">
       
    <form class="register-form" method="post">
        
      <input type="text"  placeholder="User-Name" name="newnameu" required />
      <input type="password"  placeholder="New Password" name="newpassu" required />
      <input type="text"  placeholder="Email id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" required />
      <textarea style="width:98%;margin-bottom: 6%;"name="address" placeholder="  Address" rows="3" required ></textarea>
     <button type="submit" name="submit0" style="color:blue"> Register </button>
     <p class="message"> Already Registered? <a href="#"> Login </a> </p>
     <?php
            $register=false;

            // FOR REGISTERED
            if(isset($submit0))
            {    
                $conn2 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                // Check connection
                if ($conn2->connect_error) {
                    die("Connection failed: " .$conn2->connect_error);
                }
            $sql2 = "INSERT INTO loginuser(name,password,email,address) VALUES('$newnameu','$newpassu','$email','$address');";
            if ($conn2->query($sql2) === TRUE) {
                $register=true;
                echo '<p class="db" style="border:solid;border-color:green;padding:8pt;"> Registration Successfull !!! </p> '; 
            }
                else {  echo '<p class="db" style="border:solid;border-color:red;padding:8pt;"> Error in Registration !!! </p> '; }
             $conn2->close();
            }   
       ?>
    
    </form>
       
    <form class="login-form" method="post" >
           <input type="text"  placeholder="User Name" name="txtnameu" required />
           <input type="password" placeholder="Password" name="txtpassu" required />
           <button type="submit" name="submit1" style="color:red"> SUBMIT </button>
           <p class="message"> Not Registered? <a href="#"> Register</a> </p> 
           <?php
                    $found=false;
                    //FOR LOGIN 
                    if(isset($submit1) )
                    {    
                        $conn3 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                        // Check connection
                        if ($conn3->connect_error) {
                            die("Connection failed: " . $conn3->connect_error);
                        }

                        $sql3 = "SELECT * FROM loginuser";
                        $result3 = $conn3->query($sql3);

                        while($row = $result3->fetch_assoc()) 
                        {

                            if( $row["name"]==$txtnameu &&  $row["password"]==$txtpassu )
                            {    
                                $found=true;
                                setcookie( 'user_name' , $row['name'] );
                                setcookie( 'user_email' , $row['email'] );
                                header("Location: homepage_user.php");  //redirect
                            }                           
                        } 
                        if($found==false)
                            echo '<p class="db" style="border:solid;border-color:red;padding:4px;"> Invalid Username/Password!!! </p> '; 
                        $conn3->close(); 
                    }
                     
            ?>
    </form>
   </div>
  </div>
        <br>
                     <form  action="homepage.php">
                         <label class="buttonstyl" >
                       <button class="button button2">HOME PAGE</button>
                        </label>
                     </form> <br><br>
  <script src=' https://code.jquery.com/jquery-3.3.1.min.js'>     </script>
  <script>
        $('.message a').click(function() {
        $('form').animate({height: "toggle",opacity:"toggle" }, "slow");
    });
        </script>
    </body>
</html>
