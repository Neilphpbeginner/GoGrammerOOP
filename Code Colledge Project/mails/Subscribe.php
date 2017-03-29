<?php
            require_once '../session_start.php';
            $page_title = 'Subcribe';
            require_once '../Header.php';
            require_once '../appvars.php';
            if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
                
                
                $first_name = $_POST['fname'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
                $subscribe= $_POST['newsletter'];
                $subscribeouput_form = FALSE;
                $subscribeerrormassage;
        
            if (isset($_POST['submit'])) {
            
            if (empty($first_name) && !empty($surname) && !empty($email)){
                $subscribeerrormassage = "You still have to enter in your name.";
                $subscribeouput_form = TRUE;
            }
             if (!empty($first_name) && empty($surname) && !empty($email)){
                $subscribeerrormassage = "You still have to enter in your surname.";
                $subscribeouput_form = TRUE;
            }
            if (!empty($first_name) && !empty($surname) && empty($email)){
                $subscribeerrormassage = "You still have to enter in your email address.";
                $subscribeouput_form = TRUE;
            }
            if (!empty($first_name) && !empty($surname) && !empty($email)){
                
            
             $subscribeouput_form = FALSE;
             $host = "localhost";
             $user = "root";
             $password = "@Syst3m098";
             //$dbc = mysqli_connect('http://cpanel.webtasks.co.za/', 'webtasuu_amore', 'amore2015', 'webtasuu_trainingDataBase') or die ("Did not connect to server");
             $link = mysqli_connect($host, $user, $password) or die ("Did not connect to Mysql Database");
             $selectdatabase = mysqli_select_db($link, "Code_Colledge_Data") or die ("Did not select Database");
        
            $insertdata = "INSERT INTO info_user(info_user_firstname,info_user_surname,info_user_email,info_user_subscrbe) VALUES('$first_name','$surname','$email','$subscribe')";
            $results = mysqli_query($link, $insertdata) or die("Data was not captured");
        
            $selectdata = "SELECT * FROM info_user";
            $results = mysqli_query($link, $selectdata) or die ("Could not find data");
           
        
            echo "Hi ".$first_name." ".$surname." your details was successfully captured on our system";
        
            mysqli_close($link);
        }
            
    }
            else { $subscribeouput_form = TRUE;}
            
            if ($subscribeouput_form){
                ?>
     
            <form method="post" action=<?php $_SERVER['PHP_SELF'];?>>
                    <label>User Details</label><br>
             
                    <label>Name:</label>
                    <input type="text" name="fname" placeholder="First Name" value=<?php echo $first_name;?>><br>
              
                    <label>Surname:</label>
                    <input type="text" name="surname" placeholder="Surname" value=<?php echo $surname;?>><br>
               
                    <label>Email:</label> 
                    <input type="email" name="email" placeholder="Email Address" value=<?php echo $email;?>><br>
                    <label>Subscribe to our newsletter</label>
                    Yes<input type="radio" name="newsletter" value="Y">
                    No<input type="radio" name="newsletter" value="N"> <br>
                    <input type="submit" name="submit" value="Submit">
                    
                    <br>
                    <br>
                <?php echo $subscribeerrormassage; ?>
                
            </form> 
                <?php
                }
                 require_once '../Footer.php';
            
            ?>
             

