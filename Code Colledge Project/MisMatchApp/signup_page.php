
<?php 
        session_start();
        $page_title = 'Sign UP';
        require_once '../Header.php';
        require_once '../appvars.php';
        include '../riskyJobs/library.php';
        

                $link = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA) or die (mysqli_error($link));
                $signupname = mysqli_real_escape_string($link, trim($_POST['username']));
                $signuppw = mysqli_real_escape_string($link, trim($_POST['password']));
                $signuppw2 = mysqli_real_escape_string($link, trim($_POST['password2']));
                $signupoutputform = FALSE;
                $pattern = '^\S*(?=\S{12,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=[\W])\S*$';
                $passwordfunction = new password($signuppw);
                $password = $passwordfunction->passwordValidation();
                $signupmassage = '';
                $verification = sha1($_POST['verify']);
                $captchasignup = new captchaPassPhrase();
                        if (!empty($_SESSION['pass_phrase']) || !isset($_SESSION['pass_phrase'])){
                        
                        
                
                if (isset($_POST['submit'])) {
                    
                    if ( !empty($signupname) && !empty($signuppw) && empty($signuppw2)){
                        $signupoutputform = TRUE;
                        $signupmassage = 'You still have to re enter in your password';
                    }
                    if ( !empty($signupname) && empty($signuppw) && !empty($signuppw2)){
                        $signupoutputform = TRUE;
                        $signupmassage = 'You still have enter in your password';
                    }
                    
                    if ( empty($signupname) && !empty($signuppw) && !empty($signuppw2)){
                        $signupoutputform = TRUE;
                        $signupmassage = 'You still have enter in your username';
                    }
                    if (!preg_match($pattern, $signuppw)) {
                        $signupmassage = 'Invalid Password';
                        
                    }
                    
                        if (sha1($_SESSION['pass_phrase']) == $verification) {
                            
                            $captchasignup->passphrase();    
                        
                            if ( !empty($signupname) && !empty($signuppw) && !empty($signuppw2)){
                                $signupoutputform = TRUE;
                                if ($signuppw == $signuppw2){

                                    if  ($passwordfunction->passwordValidation()){  

                                    $signupquery = 'SELECT * FROM mismatch_user';
                                    $signupqueryresult = mysqli_query($link, $signupquery) or die (mysqli_error($link));

                                   while ($row = mysqli_fetch_array($signupqueryresult)) {
                                       extract($row);
                                       $user = $row['username'];
                                   }

                                        if ($user != $signupname){
                                            $captchasignup->passphrase();
                                        }
                                            $createuser = "INSERT INTO mismatch_user(username,password,join_date) VALUES('$signupname',SHA('$signuppw'),NOW());";
                                            $createuserresults = mysqli_query($link, $createuser) or die ('Could not register User');
                                            $signupmassage = 'User successfully added to our system';

                                        }
                                        else {
                                            $signupmassage = 'Username already registered on our system';

                                        }
                                    }
                                    else {
                                            $signupmassage = 'Your password needs to be atleast 10 charaters long including one special charater, one number and one Capital letter';

                                    }
                                        } 
                                        else {
                                            $signupmassage = 'Your two passwords doesnt corrospond to each other';
                                }
                            }
                                $signupoutputform=TRUE;

                            }
                            else {
                                $signupoutputform=TRUE;
                                $signupmassage = 'Verification Code Incorrect.';

                            }
                } else {
                    $signupoutputform = TRUE;
                }
                
                                if($signupoutputform){

            ?>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <label>Username:</label>
            <input type="text" name="username" id="username" value=<?php echo $signupname;?>><br /> 
            <label>Password:</label>
            <input type="password" name="password" id="password" value=<?php echo $signuppw;?>><br />
            <label>Re-Enter Password:</label>
            <input type="password" name="password2" id="password2" value=<?php echo $signuppw2;?>><br />
            <label>Verify:</label>
            <input type="text" name="verify" id="verify"<br/>
            <?php echo '<img src="../riskyJobs/temp.png" alt="Verification Image">'; ?><br/> 
                      
            <?php echo $signupmassage;?><br><br>
            <input type="submit" name="submit" value="Submit">
           
        </form>
        <?php 
            }
            require_once '../Footer.php';
                      
        ?>
        


