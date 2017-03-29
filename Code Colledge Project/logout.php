
<?php 
        require_once 'session_start.php';
        $page_title = 'Log Out Page';
        require_once 'Header.php';
        $logoutvar = $_POST['logout'];
         if (isset($_POST['submit'])){
             
            if($logoutvar=='Y') {
                
                if (isset($_SESSION['user_id'])){ 
                $_SESSION = array();
                    if (isset($_COOKIE[session_name()])) {
                    setcookie(session_name(),'',time()-3600);
                }
                
                session_destroy();
    
            }
            
            
            setcookie('user_id', '', time() - 3600);
            setcookie('username', '', time() - 3600);        
            
            $home = 'http://'.$_SERVER['HTTP_HOST'].'/index.php';
            header('Location:'.$home);
         }
    else {
            echo '<p>Would you like to return to the <a href="../index.php">home page </a><p>';
 }
         }


        
         if(($_SESSION['user_id'])) 
            {
        ?>
    
        <form method="post" action=<?php $_SERVER['PHP_SELF'];?>>
            <fieldset>
                <h3>Are you sure you want to log out?</h3><br>
                Yes<input type="radio" name="logout"  value="Y">
                No<input type="radio" name="logout"  value="N">
                <input type="submit" name="submit"  value="Submit">
            </fieldset>
            
        </form>
       <?php 
            }
            require_once '../Footer.php';
       ?>
  
