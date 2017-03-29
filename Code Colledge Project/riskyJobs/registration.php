<?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/session_start.php';
            $page_title = 'Risky Jobs - Registration';
            require_once $_SERVER['DOCUMENT_ROOT'].'/Header.php';
            echo '<img src="riskyjobs_title.gif" alt="Risky Jobs" />';
            echo '<img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />';
            require_once $_SERVER['DOCUMENT_ROOT'].'/appvars.php';
            include_once 'library.php';
            
            
             if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
                
         if(isset($_POST['submit'])){
            $link   =   mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA);
            $first_name =   mysqli_real_escape_string($link , trim($_POST['firstname']));
            $last_name  =   mysqli_real_escape_string($link , trim($_POST['lastname']));
            $email  =   $_POST['email'];
            $phone  =   $_POST['phone'];
            $job    =   $_POST['job'];
            $resume =   $_POST['resume'];
            
            $errormsg   =   '';
            $output_form    =   FALSE;
            
                if( !empty($first_name) &&  !empty($last_name)  &&  !empty($email)  &&  !empty($phone)  &&  !empty($job)    &&  empty($resume)){
                     $output_form    =   TRUE;
                     $errormsg       =   "You still have to tell us something about yourself.";
                    
                }
                if( !empty($first_name) &&  !empty($last_name)  &&  !empty($email)  &&  !empty($phone)  &&  empty($job)    &&  !empty($resume)){
                     $output_form    =   TRUE;
                     $errormsg       =   "You still have to fill in your desired Job you want.";
                    
                }
                if( !empty($first_name) &&  !empty($last_name)  &&  !empty($email)  &&  empty($phone)  &&  !empty($job)    &&  !empty($resume)){
                     $output_form    =   TRUE;
                     $errormsg       =   "You still have to fill in your phone no.";
                    
                }
                if( !empty($first_name) &&  !empty($last_name)  &&  empty($email)  &&  !empty($phone)  &&  !empty($job)    &&  !empty($resume)){
                     $output_form    =   TRUE;
                     $errormsg       =   "You still have to fill in your email address.";
                    
                }
                if( !empty($first_name) &&  empty($last_name)  &&  !empty($email)  &&  !empty($phone)  &&  !empty($job)    &&  !empty($resume)){
                     $output_form    =   TRUE;
                     $errormsg       =   "You still have to fill in your last name.";
                    
                }
                if( empty($first_name) &&  !empty($last_name)  &&  !empty($email)  &&  !empty($phone)  &&  !empty($job)    &&  !empty($resume)){
                     $output_form    =   TRUE;
                     $errormsg       =   "You still have to fill in your firstname.";
                    
                }
                    
                            
                
                 if( !empty($first_name) &&  !empty($last_name)  && !empty($email)  &&  !empty($phone)  &&  !empty($job)    &&  !empty($resume)){
                 
                            $phoneval = new phone('/[\(\)\-\s]/', '', $phone);
                            $output_form    =   true;
                            $regex  =   '/^[a-zA-Z0-9][a-zA-Z0-9\._\W\w]*@/';
                            
                            if (!$phoneval->phoneValidation()){
                                $output_form    =   TRUE;
                                $errormsg       =   "Invalid phone no.";
                                
                            }
                           
                            
                            if (!preg_match($regex, $email)) {
                                $output_form    =   TRUE;
                                $errormsg       =   "Invalid Email Address.";
                                
                            }
                             
                            else {
                                
                                $domain = preg_replace($regex, '', $email);
                            }
                                if (!checkdnsrr($domain))
                                {
                                $errormsg       =   "Invalid DNS Server.";
                                }   
                            else {
                            
                            $newphoneno = $phoneval->phoneValidation();
                            
                            if (strlen($newphoneno)==10) {
                            $query      =   "INSERT INTO riskyjobs_suerbase (first_name,last_name,email_address,phone_no,job_description,resume) VALUES('$first_name','$last_name','$email','$newphoneno','$job','$resume')";
                            $result     =   mysqli_query($link, $query) or die ('What the fuck');
                            $errormsg   =   'Welcome to Riskyjobs';
                                    
                                
                            }
                        }      
                    }
                }
         
                   
                else {
                    $output_form    =   TRUE;
                    
                }
         
                if($output_form) {
             
    ?>

            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
            <label>First Name:</label>
            <input class="form-control" type="text" name="firstname" id="firstname"     value="<?php echo $first_name; ?>"><br>
                </div>
                <div class="form-group">
            <label>Last Name:</label>
            <input class="form-control" type="text" name="lastname" id="lastname"       value="<?php echo $last_name; ?>"><br>
                </div>
                <div class="form-group">
            <label>Email Address:</label>
            <input class="form-control" type="text" name="email" id="email"             value="<?php echo $email; ?>"><br>
                </div>
                <div class="form-group">
            <label>Phone Number:</label>
            <input class="form-control" type="tel" name="phone" id="phone"  placeholder="(000)-0000-000"          value="<?php echo $phone; ?>"><br>
                </div>
                <div class="form-group">
            <label>Job Title:</label>
            <input class="form-control" type="text" name="job" id="job"                 value="<?php echo $job; ?>"><br>
                </div>
                <div class="form-group">
            <label>About yourself:</label>
            <textarea rows="5" cols="28" class="form-control" name="resume" id="resume"><?php echo $resume; ?></textarea><br>
                </div>
            <input type="submit" name="submit" value="Submit"><br>
            <?php echo '<br>'.$errormsg ?>
            </fieldset
        </form> 
<?php
                }
            else {$output_form  =   true;}
            require_once '../Footer.php';
            
?>

