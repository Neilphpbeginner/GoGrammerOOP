<?php
            require_once '../session_start.php';
            $page_title = 'Admin Page';
            require_once '../Header.php';
            require_once '../appvars.php';
        if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
        
                    if ( isset($_GET['id']) &&  isset($_GET['date']) && isset($_GET['name']) && isset($_GET['score']) && isset($_GET['screenshot'])) {
        
        
        $delid = $_GET['id'];
        $deldate = $_GET['date'];
        $delname = $_GET['name'];
        $delscore = $_GET['score'];
        $delscreenshot = $_GET['screenshot'];
        
                }
                    else if (isset($_POST['id']) &&isset($_POST['name']) && isset($_POST['score']))
                {
           
        $delid = $_POST['id'];   
        $delname = $_POST['name']; 
        $delscore = $_POST['score'];
                }
                    else {
                    echo '<p>Sorry no High Score was specified</p>';
                        
                }
                    if (isset($_POST['confirm'])){
                        if ($_POST['confirm']=='Yes') {
                            
                            @unlink(GW_UPLOADPATH,$delscreenshot);
                            $linkserver = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD) or die ('Could not connect to Server');
                            $datagw = mysqli_select_db($linkserver, DB_HOST_DATA) or die ('Could not connect to Database');
                            $delhigh = "DELETE FROM guitarwars WHERE id=".$delid." LIMIT 1";
                            $delresults = mysqli_query($linkserver, $delhigh) or die ('Could not delete information');
                        
                            echo 'The score of '.$delname." was sucsessfully removed from our system";
                            
                        }
                        
                        else {
                            echo 'The score of '.$delname." was not sucsessfully removed from our system";
                            
                        }
                                            
                        }
                        else if (isset($delid) && isset($delname) && isset($deldate) && isset($delscore)) {
                            echo '<p>Are you sure you want to delete the following high score?</p>';
                            echo '<p><strong>Name: </strong>' . $delname . '<br /><strong>Date: </strong>' . $deldate .
                            '<br /><strong>Score: </strong>' . $delscore . '</p>';
                            echo '<p><strong>Screenshot</strong></p><br>';
                            echo '<img src="'.GW_UPLOADPATH.$delscreenshot.'"/>';
                            echo '<form method="post" action="remove.php">';
                            echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
                            echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
                            echo '<input type="submit" value="Submit" name="submit" />';
                            echo '<input type="hidden" name="id" value="' . $delid . '" />';
                            echo '<input type="hidden" name="name" value="' . $delname . '" />';
                            echo '<input type="hidden" name="score" value="' . $delscore . '" />';
                            echo '</form>';
  }

                            echo '<p><a href="removehighscore.php">&lt;&lt; Back to admin page</a></p>';
        
        
        
        ?>
        
        <div>
            <p id="timestamp"></p>
        </div>
        
        
    </body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

