<?php
            require_once '../session_start.php';
            $page_title = 'Approved Scores';
            require_once '../Header.php';
            require_once '../appvars.php';
            include '../riskyJobs/library.php';
            if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
                
        
        
                    if ( isset($_GET['id']) &&  isset($_GET['date']) && isset($_GET['name']) && isset($_GET['score']) && isset($_GET['screenshot'])) {
        
        
        $appid = $_GET['id'];
        $appdate = $_GET['date'];
        $appname = $_GET['name'];
        $appscore = $_GET['score'];
        $appscreenshot = $_GET['screenshot'];
        
                }
                    else if (isset($_POST['id']) &&isset($_POST['name']) && isset($_POST['score']))
                {
           
        $appid = $_POST['id'];   
        $appname = $_POST['name']; 
        $appscore = $_POST['score'];
                }
                    else {
                    echo '<p>Sorry no High Score was approved</p>';
                        
                }
                    if (isset($_POST['confirm'])){
                        if ($_POST['confirm']=='Yes') {
                            
                            
                            $linkserver = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD) or die ('Could not connect to Server');
                            $datagw = mysqli_select_db($linkserver, DB_HOST_DATA) or die ('Could not connect to Database');
                            $apphigh = "UPDATE guitarwars SET approve=1 WHERE id='$appid'";
                            $appresults = mysqli_query($linkserver, $apphigh) or die ('Could not approve High Score');
                        
                            echo 'The score of '.$appname." was sucsessfully approved on our system";
                            
                        }
                        
                        else {
                            echo 'The score of '.$appname." was invalid";
                            
                        }
                                            
                        }
                        else if (isset($appid) && isset($appname) && isset($appdate) && isset($appscore)) {
                            echo '<p>Are you sure you want to approve the following high score?</p>';
                            echo '<p><strong>Name: </strong>' . $appname . '<br /><strong>Date: </strong>' . $deldate .
                            '<br /><strong>Score: </strong>' . $appscore . '</p>';
                            echo '<p><strong>Screenshot</strong></p><br>';
                            echo '<img src="'.GW_UPLOADPATH.$appscreenshot.'"/>';
                            echo '<form method="post" action="approvescore.php">';
                            echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
                            echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
                            echo '<input type="submit" value="Submit" name="submit" />';
                            echo '<input type="hidden" name="id" value="' . $appid . '" />';
                            echo '<input type="hidden" name="name" value="' . $appname . '" />';
                            echo '<input type="hidden" name="score" value="' . $appscore . '" />';
                            echo '</form>';
  }

                            echo '<p><a href="removehighscore.php">&lt;&lt; Back to admin page</a></p>';
        
                            require_once '../Footer.php';
        
        ?>
        

