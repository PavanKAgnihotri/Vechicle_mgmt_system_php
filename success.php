<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <style> 
       body{
        background:url(pictures/backgnd.jpg);
        background-size: cover;
        background-attachment: fixed;    
       }
    .ticket {
      background:yellowgreen ;
      background-size: cover;           
      border-radius: 4px;
      width: 40%;
      bottom: 10px;
      box-shadow: 1px 0px 10px black inset;
    height: 100%;
    
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
     }  
    </style>
    </head>
     <?php  $tid=$_COOKIE['t_id']; $purch_date= $_COOKIE['v_date']; $veh_type=$_COOKIE['v_type'];   
               $veh_brand=$_COOKIE['v_brand'];  $veh_name=$_COOKIE['v_name']; $veh_price='Rs '.$_COOKIE['v_price'];
               $custm=$_COOKIE['user_name']; $sendmail=$_COOKIE['user_email'];
     ?>
    <body>
        <h1 style="color:red; text-align:center;"><u>Receipt Detail</u></h1> <br>
        <h3 style="color:black" align="left">Congratulation <?php echo $custm;?>, Your Payment is Successfully Completed!!</h3>
        <br>
       
        <div style="text-align:center" class="ticket"> 
            <br><br>
         <h3 style="color:blue;" ><u>PURCHASE INFORMATION</u></h3>
         <br>
        <h3  >Transaction id: #<?php echo $tid;?></h3>
         <h3 >Date of Purchase: <?php echo$purch_date; ?> </h3>
         <h3  > Vehicle Type: <?php  echo $veh_type ?> </h3>   
         <h3  > Vehicle Brand: <?php echo $veh_brand;?> </h3>
         <h3  > Vehicle Name: <?php  echo $veh_name; ?></h3> 
         <h3  > Total Price: <?php echo $veh_price; ?> </h3>         
  <br><br>
       </div>  <br>
         <a href="homepage_user.php">Click here to redirect to home page</a>
    <?php
        $bodyvaraible='   <h3 style="color:black;">Congratulation '.$custm.', Your Payment is Successfully Completed!!</h3>
                            <div style="text-align:center;background:yellowgreen;border-radius:4px;width:40%; " > 
                                <br><br>
                                 <h3 style="color:blue"><u>PURCHASE INFORMATION</u><h3>
                                 <br>
                                 <h3  >Transaction id: #'.$tid .' </h3>
                                 <h3 >Date of Purchase: '.$purch_date.'  </h3>
                                 <h3  > Vehicle Type: '.$veh_type .' </h3>   
                                 <h3  > Vehicle Brand: '.$veh_brand.'</h3>
                                 <h3  > Vehicle Name: '.$veh_name.'</h3> 
                                 <h3  > Total Price: '.$veh_price.'  </h3>         
                                 <br><br>
                                </div> ';
        
	require 'phpmailer/PHPMailerAutoload.php';

	$fromaddress='loyalshare.alerts@gmail.com';
        $pass='loyalshare123'; 

		$mail= new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
 
		$mail->Username = $fromaddress;
		$mail->Password = $pass;
			
		// Email Sending Details

		$mail->setFrom($fromaddress,"Vehicle Management System");
		$mail->addAddress($sendmail);
                
		$mail->isHTML(true);
		$mail->Subject = 'Auto-Generated BILL';
		$mail->Body=$bodyvaraible;
		
	// Success or Failure
	if (!$mail->send()) 
	{
	$error = "Mailer Error: " .$mail->ErrorInfo;
	echo '<p id="para">'.$error.'</p>';
	}
	else {
	echo '  <h4 style="color:black;">Note: Vehicle purchase details is sent to your Email Id.</h4>';
	}

?>
       <br><br>

    </body>
</html>
