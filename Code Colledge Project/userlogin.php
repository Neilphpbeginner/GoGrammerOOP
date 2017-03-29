
<?php 
            session_start();
            $page_title = 'User Login';
            require_once 'Header.php';
            require_once 'appvars.php';
//            require 'riskyJobs/library.php';
            $errormsg ="";
//            $capths = new captchaPassPhrase();
//            $capths->passphrase();
            
    
        if (!isset($_SESSION['user_id'])) {
            if(isset($_POST['submit'])) {
                $link = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA);
                $loggedinuser = mysqli_real_escape_string($link, trim($_POST['user']));
                $loggedinuserpassword = mysqli_real_escape_string($link, trim($_POST['pass']));
                if (!empty($loggedinuser) && (!empty($loggedinuserpassword))){
                    $logquery = "SELECT user_id, username  FROM mismatch_user WHERE username='$loggedinuser' AND password=SHA('$loggedinuserpassword')";
                    $logresults = mysqli_query($link, $logquery) or die('Did not connect to server');   
                    
                        if(mysqli_num_rows($logresults)== 1 ){
                            $row = mysqli_fetch_array($logresults);
                            echo $row;
                            $_SESSION['user']=$row['username'];
                            $_SESSION['user_id']=$row['user_id'];
                            setcookie('user_id',$row['user_id'],time()+(60*60*24*7));
                            setcookie('user',$row['username'],time()+(60*60*24*7));
                            
                            $home = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'MisMatchApp/viewprofile.php';
                            header('Location:'.$home);
                        }
                        else {
                            $errormsg = 'Sorry, you must enter a invalid username and password to log in';
                        }
                    }
                        else {
                            $errormsg ="Login details not entered";
                        }
                    }
                
                }
        if (empty($_SESSION['user_id'])){
            $errormsg;
        ?>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
           
                <div class="form-group">
            <label>Username:</label>
            <input class="form-control" type="text" name="user" id="username"><br>
                </div>
                <div class="form-group">
            <label>Password:</label>
            <input class="form-control" type="password" name="pass" id="password"><br>
                </div>
            <input type="submit" name="submit" value="Submit"><br>
            
            <?php echo $errormsg ?>
            </fieldset
        </form>
        <?php 
        }
        else {
            echo 'Hello welcome back '.$_SESSION['user'];
            
        }
            require_once 'Footer.php';
        ?> 
 
