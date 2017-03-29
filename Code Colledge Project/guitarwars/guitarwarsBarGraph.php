<?php

            require_once '../session_start.php';
            require_once '../riskyJobs/library.php';
            $page_title = 'Guitar Wars Bar Graph';
            require_once '../Header.php';
            require_once '../appvars.php';
            
            
            
            if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
            
            
                $link           =   mysqli_connect(DB_HOST,DB_USER,DB_USER_PASSWORD,DB_HOST_DATA) or die ("Did not connect to Mysql Database");
                $query          =   "SELECT gw.name AS Names, gw.score/10000 AS Scores FROM guitarwars AS gw ORDER BY gw.score DESC";
                $result         =   mysqli_query($link, $query) or die('hello');
                $data          =   array();
                
                    while($row  = mysqli_fetch_array($result)) {
                        
                        array_push($data, $row);
                    }
                    $scores = array_slice($data, 0);
                    
                
                
                    $max_value  = 1000; //intval($scores[0]['Scores']/1000);
                
                
                
               
                $graph = new draw_Data_Bar_Graph(1200, 1200,  $scores, $max_value, GW_UPLOADPATH . 'guitarwarsgraph.png');
                $graph->drawGraph();
                echo '<img src="' . GW_UPLOADPATH . 'guitarwarsgraph.png" alt="High Score Graph" /><br />';
                    
                    
                
                   





























?>
