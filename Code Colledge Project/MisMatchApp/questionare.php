<?php
            require_once '../session_start.php';
            $page_title = 'MisMatch Questionare';
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
                $query = 'SELECT * FROM mismatch_response WHERE user_id="'.$_SESSION['user_id'].'"';
                $results = mysqli_query($dbc, $query) or die (mysqli_error());
                
                
                    if(mysqli_num_rows($results) == 0) {
                        
                        $query = 'SELECT topic_id FROM mismatch_topic ORDER BY category_id, topic_id';
                        $result = mysqli_query($dbc, $query);
                        $topicIds = array();
                        while ($row= mysqli_fetch_array($result)){
                            array_push($topicIds, $row['topic_id']);
                        }
                    }
                    
                    foreach ($topicIds as $topic_id){
                        $query3 = 'INSERT INTO mismatch_response (user_id,topic_id) VALUES("'.$_SESSION['user_id'].'", '.$topic_id.')';
                        $insertzeros = mysqli_query($dbc, $query3) or die (mysqli_errno());
                        
                    }
                    if (isset($_POST['submit'])) {
                    
                    foreach ($_POST as $response_id => $response) {
                      $query = "UPDATE mismatch_response SET response = '$response' WHERE response_id = '$response_id'";
                      mysqli_query($dbc, $query);
                    }
                    echo '<p>Your responses have been saved.</p>';
  }
                
                    $query = 'SELECT mr.response_id, mr.topic_id, mr.response, mt.name AS topic_name, mc.name AS category_name FROM mismatch_response AS mr INNER JOIN mismatch_topic AS mt USING(topic_id) INNER JOIN mismatch_category AS mc USING (category_id) WHERE mr.user_id='.$_SESSION['user_id'].'';

                    $data = mysqli_query($dbc, $query) or die(mysqli_error());
                    $responses = array();
                    
                    while ($row = mysqli_fetch_array($data)) {
                          array_push($responses, $row);    
                        
                      }
                    

                    mysqli_close($dbc);

  
                    echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
                    echo '<p>How do you feel about each topic?</p>';
                    $category = $responses[0]['category_name'];
                    echo '<fieldset><legend>' . $responses[0]['category_name'] . '</legend>';
                    foreach ($responses as $response) {
                      // Only start a new fieldset if the category has changed
                      if ($category != $response['category_name']) {
                        $category = $response['category_name'];
                        echo '</fieldset><fieldset><legend>' . $response['category_name'] . '</legend>';
                      }

                      // Display the topic form field
                      echo '<label  for="' . $response['response_id'] . '">' . $response['topic_name'] . ':</label>';
                      echo '<input type="radio" id="' . $response['response_id'] . '" name="' . $response['response_id'] . '" value="1" ' . ($response['response'] == 0 ? 'checked="checked"' : '') . ' />Unknown ';
                      echo '<input type="radio" id="' . $response['response_id'] . '" name="' . $response['response_id'] . '" value="1" ' . ($response['response'] == 1 ? 'checked="checked"' : '') . ' />Love ';
                      echo '<input type="radio" id="' . $response['response_id'] . '" name="' . $response['response_id'] . '" value="2" ' . ($response['response'] == 2 ? 'checked="checked"' : '') . ' />Hate<br />';
                    }
                    echo '</fieldset>';
                    echo '<input type="submit" value="Save Questionnaire" name="submit" />';
                    echo '</form>';

            require_once '../Footer.php';
            
?>

