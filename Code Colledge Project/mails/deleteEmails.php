<?php
            require_once '../session_start.php';
            $page_title = 'Delete Emails';
            require_once '../Header.php';
            require_once '../appvars.php';
            
             if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
        
            echo '<form method="post" action="<?php $_SERVER[PHP_SELF] ?>">';
            $host = "localhost";
            $user = "root";
            $password = "@Syst3m098";
            $message;
            $link = mysqli_connect($host, $user, $password) or die ("Did not connect to Mysql Database");
            $selectdatabase = mysqli_select_db($link, "Code_Colledge_Data") or die ("Did not select Database");
        
        if (isset($_POST['submit'])) {
                foreach ($_POST['todelete'] as $delcust) {
                $delcustquery = "DELETE FROM info_user WHERE info_userid='$delcust'";  
                $resultsdelcust = mysqli_query($link, $delcustquery)or die("Could not remove customers");
                }
                $message = "Customer(s) removed for the system";
                    
            }
                $emaildelselect = "SELECT * FROM info_user";
                $resultdelselect = mysqli_query($link, $emaildelselect);
                while($row = mysqli_fetch_array($resultdelselect)) {
                    extract($row);
                    echo "<input type='checkbox' value=".$row['info_userid']." name='todelete[]' />";
                    echo $row['info_user_firstname']," ";
                    echo $row['info_user_surname']," ";
                    echo $row['info_user_email']," ";
                    echo "<br />";
                } 
        ?>
           
            <input type="submit" value="Remove" name="submit"><br>
            <?php echo $message;?>
        </form>
        <?php 
                require_once '../Footer.php';
?>

