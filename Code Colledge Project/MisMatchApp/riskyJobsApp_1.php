<?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/session_start.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/Header.php';
            $page_title = 'Risky Jobs';
            require_once $_SERVER['DOCUMENT_ROOT'].'/appvars.php';
            
            
             if (!isset($_SESSION['user_id'])) {
                 echo '<p>Please <a href="../MisMatchApp/userlogin.php">log in</a> to access this page.</p>';
                   exit();
               }   
               else {
                   echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="logout.php">Log out</a>.</p>');
               }
             include_once 'library.php'; 
            
            
                    echo '<h3>Risky Jobs - Search</h3>';
                    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
                    echo '  <label for="usersearch">Find your risky job:</label><br /> ';
                    echo '<input type="text" id="usersearch" name="usersearch" /><br />';
                    echo '<input type="submit" name="submit" value="Submit" /> ';
                    echo '</form>';
                    
                    if (isset($_POST['submit'])) {
                        
                            $user_search = $_POST['usersearch'];
                            $newFunctionTest = new library();
                            $search_query = $newFunctionTest->build_query($user_search);
                           
                            

                    echo '<table border="0" cellpadding="2">';
                        
                        echo '<tr class="heading">';
                        echo '<td>Job Title</td><td>Description</td><td>State</td><td>Date Posted</td>';
                        echo '</tr>';
                        
                        $result = $newFunctionTest->databaseQuery();
                        while ($row = mysqli_fetch_array($result)) {
                          echo '<tr class="results">';
                          echo '<td valign="top" width="20%">' . $row['title'] . '</td>';
                          echo '<td valign="top" width="50%">' . substr($row['description'],0,100) . '...</td>';
                          echo '<td valign="top" width="10%">' . $row['state'] . '</td>';
                          echo '<td valign="top" width="20%">' . substr($row['date_posted'],0,10) . '</td>';
                          echo '</tr>';
                        } 
                        echo '</table>';
                        }
                    
 
            require_once '../Footer.php';
            
?>

