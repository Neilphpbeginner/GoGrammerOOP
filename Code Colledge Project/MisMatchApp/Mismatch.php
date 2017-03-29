<?php
            require_once '../session_start.php';
            $page_title = 'MisMatch Application';
            require_once '../Header.php';
            require_once '../appvars.php';
            include_once '../riskyJobs/library.php';
            
            
            if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
        
                $link = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA) or die('Could not connect to server');
                $query = 'SELECT * FROM mismatch_response WHERE user_id="'.$_SESSION['user_id'].'"'; 
                $data = mysqli_query($link, $query) or die('Could not find responses');
                $userresponse = array();
                    if (mysqli_num_rows($data) !=0){
                        $query = 'SELECT mr.response_id, mr.topic_id, mr.response, mt.name AS topic_name, mc.name AS category_name FROM mismatch_response AS mr INNER JOIN mismatch_topic AS mt USING(topic_id) INNER JOIN mismatch_category AS mc USING(category_id) WHERE mr.user_id="'.$_SESSION['user_id'].'"';
                        $results = mysqli_query($link, $query) or die ('???');
                       
                        
                                while($row = mysqli_fetch_array($results)) {
                                array_push($userresponse, $row);
                                
                            }
                        $mismatch_score = 0;
                        $mismatch_user_id = -1;
                        $mismatch_topic = array();
                        $mismatch_categories = array();
                        
                        $query = 'SELECT user_id FROM mismatch_user WHERE user_id !="'.$_SESSION['user_id'].'"';
                        $result = mysqli_query($link, $query) or die ('poes');
                        
                            while ($row = mysqli_fetch_array($result)){
                                $query2 = 'SELECT mr.response_id, mr.topic_id, mr.response, mt.name AS topic_name FROM mismatch_response AS mr INNER JOIN mismatch_topic AS mt USING(topic_id) WHERE mr.user_id="'.$row['user_id'].'"';
                                $result2 = mysqli_query($link, $query2) or die ('neels');
                                $mismatch_responses = array();
                            
                            while ($row2 = mysqli_fetch_array($result2)) {
                                array_push($mismatch_responses, $row2);
                            }
                                
                                $scores = 0;
                                $topics = array();
                                $categories   =   array();
//                                echo '<pre>';
//                                print_r($userresponse['category_name']);
//                                echo '</pre>';
                        
                            for ($i = 0; $i < count($userresponse); $i++) {
                               if ($userresponse[$i]['response'] + $mismatch_responses[$i]['response'] == 3) {
                               
                                 $scores += 1;
                                 array_push($topics, $userresponse[$i]['topic_name']);
                                 array_push($categories, $userresponse[$i]['category_name']);
                               }
                            }
                            
                                
                            
                            if ($scores > $mismatch_score) {
                                $mismatch_score = $scores;
                                $mismatch_user_id = $row['user_id'];
                                $mismatch_topic = array_slice($topics, 0);
                                $mismatch_categories = array_splice($categories, 0);
                                $mismatch_calc = (count($mismatch_topic) /25);
                                $persentage = round((float)$mismatch_calc * 100).' %';
                                
                                }
                            }
                            
                            
                            if ($mismatch_user_id!=0){
                                $query = 'SELECT username, first_name, last_name, gender, birthdate, city, state, picture FROM mismatch_user WHERE user_id="'.$mismatch_user_id.'" ';
                                $result = mysqli_query($link, $query);
                                
                            if (mysqli_num_rows($result) == 1){
                                $row = mysqli_fetch_array($result);
                                echo '<table><tr><td>';
                                if (!empty($row['first_name']) && !empty($row['last_name'])) {
                                  echo $row['first_name'] . ' ' . $row['last_name'] . '<br />';
                                }
                                if (!empty($row['city']) && !empty($row['state'])) {
                                  echo $row['city'] . ', ' . $row['state'] . '<br />';
                                }
                                echo '</td><td>';
                                if (!empty($row['picture'])) {
                                  echo '<img src="' . GW_UPLOADPATH2 . $row['picture'] . '" alt="Profile Picture" /><br />';
                                }
                                echo '</td></tr></table>';

                                // Display the mismatched topics
                                echo '<h4>You are mismatched on the following ' . count($mismatch_topic) . ' topics: '.$persentage.' match for each other</h4>';
                                foreach ($mismatch_topic as $topic) {
                                  echo $topic . '<br />';
                                }

                                // Display a link to the mismatch user's profile
                                echo '<h4>View <a href=viewprofile.php?user_id=' . $mismatch_user_id . '>' . $row['first_name'] . '\'s profile</a>.</h4>';
                                
                                $category_total = array(array($mismatch_categories[0],0));
                                
                                foreach ($mismatch_categories as $category) {
                                    if ($category_total[count($category_total)-1][0] !=$category){
                                        array_push($category_total, array($category,1));
                                    }
                                    else {
                                    $category_total[count($category_total)-1][1]++;
                                    }
                                }
                                $topic_totals = array(array($mismatch_topic[0],0));
                                
                                                      
                                echo '<h4>Mismatched category breakdown:</h4>';
                                $graph = new draw_Data_Bar_Graph(480, 240,  $category_total, 5, GW_UPLOADPATH2 . $_SESSION['user_id'] . '-mymismatchgraph.png');
                                $graph->drawGraph();
                                echo '<img src="' . GW_UPLOADPATH2 . $_SESSION['user_id'] . '-mymismatchgraph.png" alt="Mismatch category graph" /><br />';
                                
                                
                                
                                
                                
                                    }
    }
  }
                    
  else {
    echo '<p>You must first <a href="questionnaire.php">answer the questionnaire</a> before you can be mismatched.</p>';
  }

  mysqli_close($link);
                

            require_once '../Footer.php';
            
?>

