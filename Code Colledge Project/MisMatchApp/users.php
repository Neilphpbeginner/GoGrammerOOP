<?php
            require_once '../session_start.php';
            $page_title = 'View Profiles';
            require_once '../Header.php';
            require_once '../appvars.php';
                if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
        
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA) or die(mysqli_error());
                $query = 'SELECT * FROM mismatch_user';
                $results = mysqli_query($dbc, $query);
                echo "<table>";
                
                while ($row = mysqli_fetch_array($results)) {
                    extract($row);
                    echo '<tr><td colspan="2">Username: <a href="viewprofile.php?user_id='.$row['user_id'].'">'.$row['username'].'</a></td></tr>';
                    echo '<tr><td>';
                    echo '<strong>Name: </strong>'.$row['first_name'].'<br />';
                    echo '<strong>Last Name: </strong>'.$row['last_name'].'<br />';
                        if ($row['gender']=='M'){
                    echo '<strong>Gender: </strong>Male<br />';
                        }
                    else {
                     echo '<strong>Gender: </strong>Female<br />';   
                    }
                    echo '<strong>Birthday: </strong>'.$row['birthdate'].'<br />';
                    echo '<strong>City: </strong>'.$row['city'].'<br />';
                    echo '<strong>State: </strong>'.$row['state'].'<br />';
                     if (is_file(GW_UPLOADPATH2 . $row['picture']) && filesize(GW_UPLOADPATH2 . $row['picture']) > 0) {
                        echo '<td><img src="' . GW_UPLOADPATH2 . $row['picture'] . '" alt="Profile Pic" /></td></tr>';
                        }
                      else {
                        echo '<td><img src="' . GW_UPLOADPATH2 . 'nopic.jpg' . '" alt="No Pic" /></td></tr>';
                        }
                      
                }
            echo "</table>";
            mysqli_close($link);  
            require_once '../Footer.php';
            exit(); 
            
        ?>
  
