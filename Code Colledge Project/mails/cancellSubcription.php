<?php
            require_once '../session_start.php';
            $page_title = 'Cancell Subscription';
            require_once '../Header.php';
            require_once '../appvars.php';
            if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
                
                if(!isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])){
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] .'/MisMatchApp/userlogin.php';
                    echo 'Sorry you not currently logged in please click <a href="'.$home_url.'">here.</a>';
                    $cancelloutput_form = FALSE;
                }
                else {
                    $cancelloutput_form = TRUE;
                }
                
                if (isset($_POST['submit'])) {
                    $delemail = $_POST['email'];
                    $cancelloutput_form = FALSE;
                    $cancellerrormassage;
                    
                if (empty($delemail)) {
                    $cancelloutput_form = TRUE;
                    $cancellerrormassage ="You haven't entered an email address ?";
                }
                
                if (!empty($delemail)) {
                    $cancelloutput_form = TRUE;
                    $host = "localhost";
                    $user = "root";
                    $password = "@Syst3m098";
                
                //$dbc = mysqli_connect('http://cpanel.webtasks.co.za/', 'webtasuu_amore', 'amore2015', 'webtasuu_trainingDataBase') or die ("Did not connect to server");
                $link = mysqli_connect($host, $user, $password) or die ("Did not connect to Mysql Database");
                $selectdatabase = mysqli_select_db($link, "Code_Colledge_Data") or die ("Did not select Database");
        
                $deletdata ="DELETE FROM info_user WHERE info_user_email='$delemail'";
                $results = mysqli_query($link, $deletdata) or die("Data not deleted!!!");
        
                   
        
                echo "Succefully Removed from email list.";
                
        
                mysqli_close($link);
                
                }
                
                
            }
            
                
           
          
            if ($cancelloutput_form) {
            ?>
            
            
            
            <form method="post" action=<?php $_SERVER['PHP_SELF']?>>
                <h4 class="cancell">Please submit your email address to cancell subcription.</h4>
                <h5 class="cancell">Email Address</h5>
                <label>Email Address Detials</label><br>
             
                <label>Email :</label><input type="text" name="email" placeholder="Email Address"><br>
                <input type="submit" name="submit" value="Submit">
                    
                    <br>
                    
                
                <?php echo $cancellerrormassage  ?>
            </form>  
            <?php 
            }
            ?>
        </div>  
        <div>
            <p id="timestamp"></p>
        </div>
    </body>
</html>
