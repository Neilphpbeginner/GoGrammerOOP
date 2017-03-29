<?php
            
            require_once '../session_start.php';
            include '../riskyJobs/library.php';
            $page_title = 'High Scores';
            require_once '../Header.php';
            require_once '../appvars.php';
            $captcha    =   new captchaPassPhrase();
            
            
            
           
            
            if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
                
            if  (!empty($_SESSION['pass_phrase']) || !isset($_SESSION['pass_phrase'])){
                       
           
            
            if (isset($_POST['submit'])){
                
                    $link = mysqli_connect(DB_HOST,DB_USER,DB_USER_PASSWORD,DB_HOST_DATA) or die ("Did not connect to Mysql Database");
                    $highscorename = mysqli_real_escape_string($link, trim($_POST['namehigh']));
                    $highscore = mysqli_real_escape_string($link, trim($_POST['highscore']));
                    $screenshot = mysqli_real_escape_string($link, trim($_FILES['screenshot']['name']));
                    $screenshot_type = $_FILES['screenshot']['type'];
                    $screenshot_size = $_FILES['screenshot']['size'];
                    $user_pass_phrase = sha1($_POST['verify']);
                    $highscoreoutput = FALSE;
                    $higherrormassage   =   '';
                    
                    
                  

                
            if ( !empty($highscorename) && !empty($highscore) && empty($screenshot)) {
                $higherrormassage = "You still select your image.";
                $highscoreoutput = TRUE;
                
            }
            if ( !empty($highscorename) && empty($highscore) && !empty($screenshot)) {
                $higherrormassage = "You still have to enter in your score.";
                $highscoreoutput = TRUE;
                
            }
            if ( empty($highscorename) && !empty($highscore) && !empty($screenshot)) {
                $higherrormassage = "You still have to enter in your name.";
                $highscoreoutput = TRUE;
                
            }
            if (sha1($_SESSION['pass_phrase'])    ==  $user_pass_phrase){
                
                
                            
            if ( !empty($highscorename) && !empty($highscore) && !empty($screenshot)){
                if ( (($screenshot_type=='image/gif') || ($screenshot_type=='image/jpeg') || ($screenshot_type=='image/pjeg') || ($screenshot_type=='image/png'))  && ($screenshot_size<=GW_MAX_FILE_SIZE)){
                    if($_FILES['screenshot']['error']==0){
                        $target = GW_UPLOADPATH.$screenshot;
                            if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {

                            $highscoreoutput = TRUE;   
                            $captcha->passphrase();
                            $highscoreinput = "INSERT INTO guitarwars(date, name, score, screenshot) VALUES(NOW(), '$highscorename', '$highscore', '$screenshot');"; 
                            $resultshigh = mysqli_query($link, $highscoreinput) or die ('High score not entered into our system');
                            mysqli_close($link);
                            $higherrormassage = 'High Score Entered';
                }   
                }   else{
                        $higherrormassage = "File could not be loaded on our system";
                        $highscoreoutput = TRUE;
                }
                }
                    else{ 
                        $higherrormassage = "Incorrect image type and size of file";
                        $highscoreoutput = TRUE;
                } 
                } else {
                        $higherrormassage = "Fucker";
                        $highscoreoutput = TRUE;
                    
                }
            
                @unlink($_FILES['screenshot']['tmp_name']);
                }else {
                        $higherrormassage   =   'Verification code incorrect';
                        $highscoreoutput = TRUE;
                }   
            
            }
                    else {
                        
                        $highscoreoutput = TRUE;
                    }
                    

            }
                    




                if ($highscoreoutput){ 

                    ?>
        <form enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']; ?>"
              <input type="hidden" name="MAX_FILE_SIZE" value="3273800" />
                      
                    <h3>Enter In Your High Score</h3>
                      <label>Name: </label><br/>
                      <input type="text" name="namehigh" value='<?php echo $highscorename; ?>' id="namehigh"><br/>
                      <label>High Score:</label><br/>
                        <input type="text" name="highscore" id="highscore" value='<?php echo $highscore; ?>'><br/>
                      <label>Verify:</label><br/>
                        <input type="text" name="verify" id="verify" <br/>
                        <?php echo '<img src="../riskyJobs/temp.png" alt="Verification Image">'; ?><br/> 
                        
                        
                        <label>Screen Shot:</label> <br>
                        <input type="file" name="screenshot" id="screenshot">
                        <input type="submit" name="submit" value="Submit"/><br>
                        <?php echo "<br>"; ?>
                        <?php echo $higherrormassage?>
                        

                        
                        
                        
                </form>
        
        <?php 
            }
            require_once '../Footer.php';
        ?>
        


