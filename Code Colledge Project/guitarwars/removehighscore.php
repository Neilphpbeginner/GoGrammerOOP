<?php
            require_once '../session_start.php';
            $page_title = 'Remove High Scores';
            require_once '../Header.php';
            require_once '../appvars.php';
     
        
        
        
        $linkserver = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA);
        $array = "SELECT * FROM guitarwars ORDER BY score DESC, date ASC";        
        $data = mysqli_query($linkserver, $array) or die ("Data not selected");
            
            echo '<table>';
            echo '<tr><th>Name: </th><th>Score: </th><th>Date of Score: </th><th>Action: </th></tr>';
            
                while($row = mysqli_fetch_array($data)) {
                    
                    echo '<tr><td><strong>Name: </strong>'.$row['name'].'</td>';
                    echo '<td>'.$row[score].'</td>'.' ';
                    echo '<td>'.$row[date].'</td>'.' ';
                    
                    echo '<td><a  href="remove.php?id='.$row['id'].'&amp;date='.$row['date'].'&amp;name='.$row['name'].'&amp;score='.$row['score'].'&amp;screenshot='.$row['screenshot'].'">Remove</a>'; 
                    if ($row['approve']=="0"){
                    echo '<a  href="approvescore.php?id='.$row['id'].'&amp;date='.$row['id'].'&amp;name='.$row['name'].'&amp;score='.$row['score'].'&amp;screenshot='.$row['screenshot'].'">/ Approve</a>';
                    }
                    echo '</td></tr>';
                    
                }
            echo '</table>';
            require_once '../Footer.php';
        ?>
        
        


