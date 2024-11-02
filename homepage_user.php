<?php extract($_GET);
?><html>
    <head>
        <link rel="stylesheet" href="user.css">
        <title>VEHICLE SELECTION</title>
        <style>
            body{
                background:url(pictures/backgnd.jpg);
                background-size: cover;
                background-attachment: fixed;    
                }   
        </style>
    </head>
    
    <!---BODY OF HTML-->
    <body>

        <form align="right" name="form1" method="post" action="homepage.php">
            <span style="float:right;"><button class="button button2">LOG OUT</button></span>
        </form>
        <h2 style="color:darkorchid;padding-top:10px;padding-left:5px;"> Welcome: <?php echo($_COOKIE['user_name']); ?> [User] </h2> 
        <h1 style="color:red; margin-left:9%;"> <u> VEHICLE SELECTION PAGE</u> </h1> <br>


        <!---MENU BAR-->

        <button class="tablink" onclick="openPage('Home', this, 'red')" id="defaultOpen">HOME</button>
        <button class="tablink" onclick="openPage('2wheel', this, 'green')" >Two Wheelers</button>
        <button class="tablink" onclick="openPage('3wheel', this, 'blue')">Three Wheelers</button>
        <button class="tablink" onclick="openPage('4wheel', this, 'orange')">Four Wheelers</button>
        <button class="tablink" onclick="openPage('contact', this, 'violet')">Contact </button>

        <!--HOME PAGE -->


        <div id="Home" class="tabcontent">
            <h2 style="color:green; margin-left:44%;">HOME PAGE </h2>
     
            <!--Slideshow-->

            <div class="slideshow-container" style="margin-left:20%;" >

                <div class="mySlides fade">
                    <img src="pictures/four_wheeler/benz/amggt.jpg"   height="400" width="900">
                </div>
                <div class="mySlides fade">
                    <img src="pictures/four_wheeler/hyundai/venue.jpg" height="400" width="900" >
                </div>
                <div class="mySlides fade">
                    <img src="pictures/four_wheeler/marutisuzuki/baleno.jpg" height="400" width="900" >
                </div>
                <div class="mySlides fade">
                    <img src="pictures/four_wheeler/porsche/718.jpg" height="400" width="900" >
                </div>
                <div class="mySlides fade">
                    <img src="pictures/three_wheeler/tvsauto.jpg" height="400" width="900" >
                </div>
                <div class="mySlides fade">
                    <img src="pictures/three_wheeler/atulauto.jpg" height="400" width="900" >
                </div>
                <div class="mySlides fade">
                    <img src="pictures/two_wheeler/bajaj/dominar400.jpg" height="400" width="900">
                </div>
                <div class="mySlides fade">
                    <img src="pictures/two_wheeler/hero/achiever.jpg" height="400" width="900">
                </div>
                <div class="mySlides fade">
                    <img src="pictures/two_wheeler/tvs/ntorq125.jpg" height="400" width="900">
                </div>
                <div class="mySlides fade">
                    <img src="pictures/two_wheeler/yamaha/r1.jpg" height="400" width="900" >
                </div>


            </div>


            <div style="text-align:center">
                <span class="dot"></span>  <span class="dot"></span> <span class="dot"></span>
                <span class="dot"></span>  <span class="dot"></span> <span class="dot"></span>
                <span class="dot"></span>  <span class="dot"></span> <span class="dot"></span>
                <span class="dot"></span>  

            </div>

            <script>
                var slideIndex = 0;
                showSlides();
                function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}
                for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 2000); // Change image every 2 seconds
                }
            </script> 
            <!---Search facility div-->
            <form id="regForm" method="get" action="vehicledetails.php">
        
                <div class="tab">
                       <h2 style="color:red;text-align:center;">Search Vehicle:</h2><br>
                    
                    <h3 style="color:blue; text-align:left;">Enter Vehicle Name:</h3>
                    <p><input placeholder="Vehicle.." oninput="this.className = ''" name="name"></p>
                     <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev( - 1)">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>     
                    </div>
                    
                 
                </div>

               

                <div style="text-align:center;margin-top:30px;">
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

               </form>

            <script>
                var currentTab = 0; // Current tab is set to be the first tab (0)
                showTab(currentTab); // Display the crurrent tab

                function showTab(n) {
                // This function will display the specified tab of the form...
                var x = document.getElementsByClassName("tab");
                x[n].style.display = "block";
                //... and fix the Previous/Next buttons:
                if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
                } else {
                document.getElementById("prevBtn").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
                } else {
                document.getElementById("nextBtn").innerHTML = "Next";
                }
                //... and run a function that will display the correct step indicator:
                fixStepIndicator(n)
                        }

                function nextPrev(n) {
                // This function will figure out which tab to display
                var x = document.getElementsByClassName("tab");
                // Exit the function if any field in the current tab is invalid:
                if (n == 1 && !validateForm()) return false;
                // Hide the current tab:
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                // if you have reached the end of the form...
                if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
                }
                // Otherwise, display the correct tab:
                showTab(currentTab);
                }

                function validateForm() {
                // This function deals with validation of the form fields
                var x, y, i, valid = true;
                x = document.getElementsByClassName("tab");
                y = x[currentTab].getElementsByTagName("input");
                // A loop that checks every input field in the current tab:
                for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
                }
                }
                // If the valid status is true, mark the step as finished and valid:
                if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
                }
                return valid; // return the valid status
                }

                function fixStepIndicator(n) {
                // This function removes the "active" class of all steps...
                var i, x = document.getElementsByClassName("step");
                for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
                }
                //... and adds the "active" class on the current step:
                x[n].className += " active";
                }
            </script>
            
            <!---End of search facility-->
     </div>
        <!---END OF HOME --> 

        <!---2 wheel SELECTION -->


        <div id="2wheel" class="tabcontent">
            <div class="tab1">
                <button class="tablinks1" onclick="opentype1(event, 'bajaj')" id="defaultOpen1"><p style="color:black;">BAJAJ </p></button>
                <button class="tablinks1" onclick="opentype1(event, 'hero')"><p style="color:black;">HERO</p></button>
                <button class="tablinks1" onclick="opentype1(event, 'yamaha')"><p style="color:black;">YAMAHA</p></button>
                <button class="tablinks1" onclick="opentype1(event, 'tvs')"><p style="color:black;">TVS</p></button>
            </div>     

            <div id="bajaj" class="tabcontent1">  

                <h1 style="color:green; position:relative;right:63pt;">BAJAJ </h1> <br>

                <?php
                $conn = new mysqli("localhost", "root", "", "vehicle_mgmt");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM vehicles where type='two wheeler' and brand='Bajaj' ";
                $result = $conn->query($sql);
                ?><?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        if ($row["stock"] > 0) {
                            ?> 
                            <div style="postion:absolute;padding-left: 2%;float:left;margin-left:80px;">
                                <h2 style="color:black;"> <u> <?php echo $row["name"]; ?> </u> </h2>
                                <img src="<?php echo $row["link"]; ?>" height="250" width="400">   
                                <form method="get" action="vehicledetails.php" > 
                                    <label class="logoutLblPos">
                                        &nbsp;&nbsp;<button class="button button3"  name="name" value="<?php echo $row["name"]; ?> "> PROCEED--> </button>
                                    </label> 
                                </form>
                            </div>


                            <?php
                        }
                    }
                } else {
                    echo '<p style="color:red;text-align:center;"> No Vehicles Found!!! </p> ';
                }
                $conn->close();
                ?> 


            </div>
            <div id="hero" class="tabcontent1">  
                <h1 style="color:green; position:relative;right:63pt;">HERO </h1>  <br>
                <?php
                $conn1 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                if ($conn1->connect_error) {
                    die("Connection failed: " . $conn1->connect_error);
                }

                $sql1 = "SELECT * FROM vehicles where type='two wheeler' and brand='Hero' ";
                $result1 = $conn1->query($sql1);
                ?><?php
                if ($result1->num_rows > 0) {
                    // output data of each row
                    while ($row = $result1->fetch_assoc()) {
                        if ($row["stock"] > 0) {
                            ?> 
                            <div style="postion:absolute;padding-left: 2%;float:left;margin-left:80px;">
                                <h2 style="color:black;"> <u> <?php echo $row["name"]; ?> </u> </h2>
                                <img src="<?php echo $row["link"]; ?>" height="240" width="400">   
                                <form method="get" action="vehicledetails.php" > 
                                    <label class="logoutLblPos">
                                        &nbsp;&nbsp; <button class="button button3" name="name" value="<?php echo $row["name"]; ?> "> PROCEED--> </button> 
                                    </label> 
                                </form>
                            </div>


                            <?php
                        }
                    }
                } else {
                    echo '<p style="color:red;text-align:center;"> No Vehicles Found!!! </p> ';
                }
                $conn1->close();
                ?> 

            </div>
            <div id="yamaha" class="tabcontent1">  
                <h1 style="color:green; position:relative;right:60pt;">YAMAHA </h1>  <br>
                <?php
                $conn2 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                if ($conn2->connect_error) {
                    die("Connection failed: " . $conn2->connect_error);
                }

                $sql2 = "SELECT * FROM vehicles where type='two wheeler' and brand='Yamaha' ";
                $result2 = $conn2->query($sql2);
                ?><?php
                if ($result2->num_rows > 0) {
                    // output data of each row
                    while ($row = $result2->fetch_assoc()) {
                        if ($row["stock"] > 0) {
                            ?> 
                            <div style="postion:absolute;padding-left: 2%;float:left;margin-left:80px;">
                                <h2 style="color:black;"> <u> <?php echo $row["name"]; ?> </u> </h2>
                                <img src="<?php echo $row["link"]; ?>" height="240" width="400">   
                                <form method="get" action="vehicledetails.php" > 
                                    <label class="logoutLblPos">
                                        &nbsp;&nbsp;<button class="button button3" name="name" value="<?php echo $row["name"]; ?> "> PROCEED--> </button> 
                                    </label> 
                                </form>
                            </div>


                            <?php
                        }
                    }
                } else {
                    echo '<p style="color:red;text-align:center;"> No Vehicles Found!!! </p> ';
                }
                $conn2->close();
                ?> 

            </div>
            <div id="tvs" class="tabcontent1">  
                <h1 style="color:green; position:relative;right:63pt;">TVS</h1>  <br>
                <?php
                $conn3 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                if ($conn3->connect_error) {
                    die("Connection failed: " . $conn3->connect_error);
                }

                $sql3 = "SELECT * FROM vehicles where type='two wheeler' and brand='Tvs' ";
                $result3 = $conn3->query($sql3);
                ?><?php
                if ($result3->num_rows > 0) {
                    // output data of each row
                    while ($row = $result3->fetch_assoc()) {
                        if ($row["stock"] > 0) {
                            ?> 
                            <div style="postion:absolute;padding-left: 2%;float:left;margin-left:80px;">
                                <h2 style="color:black;"> <u> <?php echo $row["name"]; ?> </u> </h2>
                                <img src="<?php echo $row["link"]; ?>" height="240" width="400">   
                                <form method="get" action="vehicledetails.php" > 
                                    <label class="logoutLblPos">
                                        &nbsp;&nbsp;<button class="button button3" name="name" value="<?php echo $row["name"]; ?> "> PROCEED--> </button>
                                    </label> 
                                </form>
                            </div>


                            <?php
                        }
                    }
                } else {
                    echo '<p style="color:red;text-align:center;"> No Vehicles Found!!! </p> ';
                }
                $conn3->close();
                ?> 

            </div>

        </div>


        <!---3 wheel SELECTION -->

        <div id="3wheel" class="tabcontent">
            <div class="tabcontent3" style="width:80%;position:relative;right:10.5%;">
                <br><h2 style="color:green; text-align:center;">TRENDING THREE WHEELER VEHICLES DISPLAYED BELOW :</h2><br><br>
                <?php
                $conn4 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                if ($conn4->connect_error) {
                    die("Connection failed: " . $conn4->connect_error);
                }

                $sql4 = "SELECT * FROM vehicles where type='Three wheeler' ";
                $result4 = $conn4->query($sql4);
                ?><?php
                if ($result4->num_rows > 0) {
                    // output data of each row
                    while ($row = $result4->fetch_assoc()) {
                        if ($row["stock"] > 0) {
                            ?> 
                            <div style="postion:absolute;padding-left: 2%;float:left;margin-left:50px;">
                                <h2 style="color:black;"> <u> <?php echo $row["name"]; ?> </u> </h2>
                                <img src="<?php echo $row["link"]; ?>" height="240" width="400">   
                                <form method="get" action="vehicledetails.php" > 
                                    <label class="logoutLblPos">
                                        &nbsp;&nbsp;<button class="button button3" name="name" value="<?php echo $row["name"]; ?> "> PROCEED--> </button>
                                    </label> 
                                </form>
                            </div>


                            <?php
                        }
                    }
                } else {
                    echo '<p style="color:red;text-align:center;"> No Vehicles Found!!! </p> ';
                }
                $conn4->close();
                ?> 
            </div>


        </div>
        <!---4 wheel SELECTION -->

        <div id="4wheel" class="tabcontent">

            <div class="tab2">
                <button class="tablinks2" onclick="opentype2(event, 'marutisuzuki')" id="defaultOpen2"><p style="color:black;">MARUTI SUZUKI </p></button>
                <button class="tablinks2" onclick="opentype2(event, 'benz')"><p style="color:black;">BENZ</p></button>
                <button class="tablinks2" onclick="opentype2(event, 'porsche')"><p style="color:black;">PORSCHE</p></button>
                <button class="tablinks2" onclick="opentype2(event, 'hyundai')"><p style="color:black;">HYUNDAI</p></button>

            </div>     

            <div id="marutisuzuki" class="tabcontent2">  
                <h1 style="color:green; position:relative;right:63pt;">MARUTI SUZUKI </h1> <br>
                <?php
                $conn5 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                if ($conn5->connect_error) {
                    die("Connection failed: " . $conn5->connect_error);
                }

                $sql5 = "SELECT * FROM vehicles where type='four wheeler' and brand='Maruti suzuki' ";
                $result5 = $conn5->query($sql5);
                ?><?php
                if ($result5->num_rows > 0) {
                    // output data of each row
                    while ($row = $result5->fetch_assoc()) {
                        if ($row["stock"] > 0) {
                            ?> 
                            <div style="postion:absolute;padding-left: 2%;float:left;margin-left:80px;">
                                <h2 style="color:black;"> <u> <?php echo $row["name"]; ?> </u> </h2>
                                <img src="<?php echo $row["link"]; ?>" height="240" width="400">   
                                <form method="get" action="vehicledetails.php" > 
                                    <label class="logoutLblPos">
                                        &nbsp;&nbsp;<button class="button button3" name="name" value="<?php echo $row["name"]; ?> "> PROCEED--> </button>
                                    </label> 
                                </form>
                            </div>


                            <?php
                        }
                    }
                } else {
                    echo '<p style="color:red;text-align:center;"> No Vehicles Found!!! </p> ';
                }
                $conn5->close();
                ?> 

            </div>
            <div id="benz" class="tabcontent2">  
                <h1 style="color:green; position:relative;right:63pt;"> BENZ </h1> <br>
                <?php
                $conn6 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                if ($conn6->connect_error) {
                    die("Connection failed: " . $conn6->connect_error);
                }

                $sql6 = "SELECT * FROM vehicles where type='four wheeler' and brand='Mercedes Benz' ";
                $result6 = $conn6->query($sql6);
                ?><?php
                if ($result6->num_rows > 0) {
                    // output data of each row
                    while ($row = $result6->fetch_assoc()) {
                        if ($row["stock"] > 0) {
                            ?> 
                            <div style="postion:absolute;padding-left: 2%;float:left;margin-left:80px;">
                                <h2 style="color:black;"> <u> <?php echo $row["name"]; ?> </u> </h2>
                                <img src="<?php echo $row["link"]; ?>" height="240" width="400">   
                                <form method="get" action="vehicledetails.php" > 
                                    <label class="logoutLblPos">
                                        &nbsp;&nbsp;<button class="button button3" name="name" value="<?php echo $row["name"]; ?> "> PROCEED--> </button>
                                    </label> 
                                </form>
                            </div>


                            <?php
                        }
                    }
                } else {
                    echo '<p style="color:red;text-align:center;"> No Vehicles Found!!! </p> ';
                }
                $conn6->close();
                ?> 

            </div>
            <div id="porsche" class="tabcontent2">  
                <h1 style="color:green; position:relative;right:63pt;">PORSCHE </h1> <br>
                <?php
                $conn7 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                if ($conn7->connect_error) {
                    die("Connection failed: " . $conn7->connect_error);
                }

                $sql7 = "SELECT * FROM vehicles where type='four wheeler' and brand='Porsche' ";
                $result7 = $conn7->query($sql7);
                ?><?php
                if ($result7->num_rows > 0) {
                    // output data of each row
                    while ($row = $result7->fetch_assoc()) {
                        if ($row["stock"] > 0) {
                            ?> 
                            <div style="postion:absolute;padding-left: 2%;float:left;margin-left:80px;">
                                <h2 style="color:black;"> <u> <?php echo $row["name"]; ?> </u> </h2>
                                <img src="<?php echo $row["link"]; ?>" height="240" width="400">   
                                <form method="get" action="vehicledetails.php" > 
                                    <label class="logoutLblPos">
                                        &nbsp;&nbsp;<button class="button button3" name="name" value="<?php echo $row["name"]; ?> "> PROCEED--> </button>
                                    </label> 
                                </form>
                            </div>


                            <?php
                        }
                    }
                } else {
                    echo '<p style="color:red;text-align:center;"> No Vehicles Found!!! </p> ';
                }
                $conn7->close();
                ?> 

            </div>
            <div id="hyundai" class="tabcontent2">  
                <h1 style="color:green; position:relative;right:63pt;">HYUNDAI </h1> <br>
                <?php
                $conn8 = new mysqli("localhost", "root", "", "vehicle_mgmt");
                if ($conn8->connect_error) {
                    die("Connection failed: " . $conn8->connect_error);
                }

                $sql8 = "SELECT * FROM vehicles where type='four wheeler' and brand='Hyundai' ";
                $result8 = $conn8->query($sql8);
                ?><?php
                if ($result8->num_rows > 0) {
                    // output data of each row
                    while ($row = $result8->fetch_assoc()) {
                        if ($row["stock"] > 0) {
                            ?> 
                            <div style="postion:absolute;padding-left:2%;float:left;margin-left:80px;">
                                <h2 style="color:black;"> <u> <?php echo $row["name"]; ?> </u> </h2>
                                <img src="<?php echo $row["link"]; ?>" height="240" width="400">   
                                <form method="get" action="vehicledetails.php" > 
                                    <label class="logoutLblPos">
                                        &nbsp;&nbsp;<button class="button button3" name="name" value="<?php echo $row["name"]; ?> "> PROCEED--> </button>
                                    </label> 
                                </form>
                            </div>


                            <?php
                        }
                    }
                } else {
                    echo '<p style="color:red;text-align:center;"> No Vehicles Found!!! </p> ';
                }
                $conn8->close();
                ?> 

            </div>

        </div>

        <!--- contact us-->

        <div id="contact" class="tabcontent">

           <div class="contact" style="width:80%;margin-left:8%;">

                <h1 style="color:green; text-align:center;">Contact Form</h1><br>
                <p style="color:red;">Please write your queries below <p>
                <form action="homepage_user.php">
                    <label style="color:black;">Full Name</label>
                    <input type="text" id="fname" name="fullname" placeholder="Your name..">

                    <label style="color:black;">Email</label>
                    <input type="text" id="lname" name="email" placeholder="Your email..">

                    <label style="color:black;">Phone </label>
                    <input type="text" id="lname" name="phone" placeholder="Your phone number...">
                    <label style="color:black;">Subject</label>

                    <textarea id="subject" name="subject" placeholder="Write something.." rows="6"></textarea>

                    <input type="submit" value="Submit">
                </form>   
                </div>
            <br><br> 

        </div>

        <script>
            <!---horizontal menu(main) -->


            function openPage(pageName, elmnt, color) {
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
            document.getElementById("defaultOpen").click();<!---vertical for two wheeler menu -->
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

        <!---vertical for four wheeler menu -->
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
