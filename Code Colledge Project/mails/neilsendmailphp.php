<?php
            require_once '../session_start.php';
            $page_title = 'Delete Emails';
            require_once '../Header.php';
            require_once '../appvars.php';
            if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
                
                
            $subject = $_POST['subject'];
            $emailcontent = $_POST['emailcontent'];
            $output_form = FALSE;
            $errormassage;

            if (isset($_POST['submit'])) {

            if ((empty($subject)) && empty($emailcontent)){
                $errormassage = 'You yet to capture anything.';
                $output_form = TRUE;
            }

            if ((empty($subject)) && !empty($emailcontent)){
                $errormassage = 'You forgot to say what the subject of the mail was';
                $output_form = TRUE;
            }
            if ((!empty($subject)) && empty($emailcontent)){
                $errormassage = 'You forgot to say what the email is all about';
                $output_form = TRUE;
            }

            if (!empty($subject)&&!empty($emailcontent)) {

            $output_form = TRUE;
            $host = "localhost";
            $user = "root";
            $password = "@Syst3m098";
            //$dbc = mysqli_connect('http://cpanel.webtasks.co.za/', 'webtasuu_amore', 'amore2015', 'webtasuu_trainingDataBase') or die ("Did not connect to server");
            $link = mysqli_connect($host, $user, $password) or die ("Did not connect to Mysql Database");
            $selectdatabase = mysqli_select_db($link, "Code_Colledge_Data") or die ("Did not select Database");
            $newsletterinsert = "INSERT INTO newsletter(email_subject,email_content) VALUES('$subject','$emailcontent');";
            $newsresult = mysqli_query($link, $newsletterinsert);
            $emailselect = "SELECT * FROM info_user";
            $resultsemailselect = mysqli_query($link, $emailselect);

                    while($row = mysqli_fetch_array($resultsemailselect)) {
                        extract($row);
                        if($row['info_user_subscrbe']=="Y"){
                        $to = $row['info_user_email'];
                        $text = "Hi ".$row['info_user_firstname']." ".$row['info_user_surname']." "."\n".$_POST['emailcontent'];
                        mail($to,$subject,$text); 
                        }
                    }
                    $output_form=FALSE;
                    echo "Mail Sent";
               }
            } else {$output_form=TRUE;}
                if ($output_form) {
            ?>


                    <form method="post" action=<?php $_SERVER['PHP_SELF']; ?>>
                        <label for="subject">Subject of email:</label><br>
                        <input id="subject" name="subject" type="text" value=<?php echo $subject; ?>><br>
                        <label for="emailcontent">Body of email:</label><br>
                        <textarea id="emailcontent" name="emailcontent" rows="8" cols="40"><?php echo $emailcontent; ?></textarea><br>
                        <input type="submit" name="submit" value="Submit" /><br>
                    <?php

                    echo $errormassage;
                ?>

                    </form>
            <?php
                }

                require_once '../Footer.php';
?>

