<?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/session_start.php';
            $page_title = 'Risky Jobs';
            require_once $_SERVER['DOCUMENT_ROOT'].'/Header.php';
            echo '<img src="riskyjobs_title.gif" alt="Risky Jobs" />';
            echo '<img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />';
            require_once $_SERVER['DOCUMENT_ROOT'].'/appvars.php';
            
            
             if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
              
            
            
                    echo '<h3>Risky Jobs - Search</h3>';
                    echo '<form method="get" action="search.php">';
                    echo '<label for="usersearch">Find your risky job:</label><br /> ';
                    echo '<input type="text" id="usersearch" name="usersearch" /><br />';
                    echo '<input type="submit" name="submit" value="Submit" /> ';
                    echo '</form>';
                    
 
            require_once '../Footer.php';
            
?>

