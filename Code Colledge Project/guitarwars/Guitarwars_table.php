<?php
            require_once '../session_start.php';
            $page_title = 'View Guitar Wars Scores';
            require_once '../Header.php';
            require_once '../appvars.php';
            if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
          
             $host = "localhost";
             $user = "root";
             $password = "@Syst3m098";
             
             //$dbc = mysqli_connect('http://cpanel.webtasks.co.za/', 'webtasuu_amore', 'amore2015', 'webtasuu_trainingDataBase') or die ("Did not connect to server");
             $link = mysqli_connect($host, $user, $password) or die ("Did not connect to Mysql Database");
             $selectdatabase = mysqli_select_db($link, "guitarwars") or die ("Did not select Database");
        
              
            $selectdata = "SELECT * FROM guitarwars WHERE approve=1 ORDER BY score DESC";
            $results = mysqli_query($link, $selectdata) or die ("Could not find data");
           
            echo "<table>";
                $i=0;
                while ($row = mysqli_fetch_array($results)) {
                    extract($row);
                    if ($i==0){
                    echo '<tr><td colspan="2" class="topscoreheader">Top Score: '.$row['score'].'</td></tr>';  
                        
                    }
                    echo '<tr><td class="scoreinfo">';
                    echo '<span class="score">'.$row['score'].'</span><br />';
                    echo '<strong>Name:</strong>'.$row['name'].'<br />';
                    echo '<strong>Date:</strong>'.$row['date'].'<br />';
                     if (is_file(GW_UPLOADPATH . $row['screenshot']) && filesize(GW_UPLOADPATH . $row['screenshot']) > 0) {
                        echo '<td><img src="' . GW_UPLOADPATH . $row['screenshot'] . '" alt="Score image" /></td></tr>';
                        }
                      else {
                        echo '<td><img src="' . GW_UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" /></td></tr>';
                        }
                        $i++;
                }
            echo "</table>";
            require_once '../Footer.php';
            mysqli_close($link);
            ?>
        


