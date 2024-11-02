<?php extract($_POST);
?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LOGIN(ADMIN) Page</title>
         <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>

        
        <br><br><br><br>
         <h1  style="color:orangered; text-shadow: 2px 2px 0px black;"> LOGIN AS ADMIN </h1>
         <br><br>
         
  <div class="login-page">     
      <div class="form" >
    <form class="login-form" method="post">
           <input type="text"  placeholder="User Name" name="txtnamea" required />
           <input type="password" placeholder="Password" name="txtpassa" required />
           <button type="submit" name="submit1" style="color:red"> SUBMIT </button>
           <?php

                    session_start();
                    $found=false;
                    // Create connection
                    if(isset($submit1))
                    {    
                        $conn1 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                        // Check connection
                        if ($conn1->connect_error) {
                            die("Connection failed: " . $conn1->connect_error);
                        }

                        $sql1 = "SELECT * FROM loginadmin";
                        $result1 = $conn1->query($sql1);

                        while($row = $result1->fetch_assoc()) 
                        {

                            if( $row["name"]==$txtnamea &&  $row["password"]==$txtpassa )
                            {    
                                $found=true;
                                setcookie( 'admin_name',$row['name'] );
                                header("Location: homepage_admin1a.php");  //redirect
                            }
                        } 
                      if($found==false) echo '<p class="db" style="border:solid;border-color:red;padding:4px;"> Invalid Username/Password!!! </p> ';  
                       $conn1->close();
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
                     </form> 


    </body>
</html>
