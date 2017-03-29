<?php

    require_once 'appvars.php';
    header('Content-type: text/xml');
    echo    '<?xml version="1.0" encoding="UTF-8"?>';
    
        $link   =   mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA);
        $query = "SELECT abduction_id, first_name, last_name, when_it_happened AS when_it_happened_rfc, " .
                    "alien_description, what_they_did FROM aliens_abduction ORDER BY when_it_happened DESC";
        $result = mysqli_query($link, $query) or die('Hello');
        
        
        echo    '<rss version="2.0">';
//        echo    '<root>';
        echo    '<channel>';
        
            echo        '<title>XML - RSS Feed Excersize</title>';
            echo        '<link>http://localhost:8080</link>';
            echo        '<description>Neil Code College Project RSS Feed</description>';
            echo        '<lanuage>en-us</lanuage>';

                    
                    while ($row = mysqli_fetch_array($result)) {echo '<item>';
                        echo '  <title>' . $row['first_name'] . ' ' . $row['last_name'] . ' - ' . substr($row['alien_description'], 0, 32) . '...</title>';
                        echo '  <link>http://www.aliensabductedme.com/index.php?abduction_id=' . $row['abduction_id'] . '</link>';
                        echo '  <pubDate>' .date(DATE_RSS, strtotime($row['when_it_happened_rfc'])) . '</pubDate>';
                        echo '  <description>' . $row['what_they_did'] . '</description>';
                        echo '</item>';
                        
                    }
        echo    '</channel>';

        echo    '</rss>';       
        
?>
