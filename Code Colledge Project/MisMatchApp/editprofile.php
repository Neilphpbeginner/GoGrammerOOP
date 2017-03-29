
        <?php
                require_once '../session_start.php';
                $page_title = 'Edit Profile';
                require_once '../Header.php';
                require_once '../appvars.php';
            
                if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
                
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA) or die(mysqli_errno());
                
                if (isset($_POST['update'])){
                   $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
                   $firstname = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
                   $lastname = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
                   $gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
                   $birthday = mysqli_real_escape_string($dbc, trim($_POST['birthday']));
                   $city = mysqli_real_escape_string($dbc, trim($_POST['city']));
                   $state = mysqli_real_escape_string($dbc, trim($_POST['state']));
                   $oldpic = mysqli_real_escape_string($dbc, trim($_POST['oldpic']));
                   $newpic = mysqli_real_escape_string($dbc, trim($_FILES['newpic']['name']));
                   $newpicsize = $_FILES['newpic']['size'];
                   $newpictype = $_FILES['newpic']['type'];
                   $error = false;
                   list($newpic_height,$newpic_width) = getimagesize($_FILES['newpic']['tmp_name']);
                   
                if (!empty($newpic)){
                    if (($newpictype == 'image/gif') || ($newpictype == 'image/jpeg') || ($newpictype == 'image/png') ||
                        ($newpictype == 'image/pjeg') && ($newpicsize <=GW_MAX_FILE_SIZE) && ($newpicsize>0)
                        && ($newpic_height<=MM_height) && ($newpic_width<=MM_width)){
                        if ($_FILES['file']['error']==0)
                            $target = GW_UPLOADPATH2.basename($newpic);
                            if (move_uploaded_file($_FILES['newpic']['tmp_name'], $target)){
                                if(!empty($oldpic) && $oldpic != $newpic){
                                    @unlink(GW_UPLOADPATH2.$oldpic);  
                                }
                              else {
                                    $error=TRUE;
                                    @unlink($_FILES['newpic']['tmp_name']);
                                    echo 'Sorry we encountered an error when uploading your new pic';
                                }  
                                
                            }
                        }
                              else {
                                    @unlink($_FILES['new_picture']['tmp_name']);
                                    $error = TRUE;
                                    echo '<p class="error">Your picture must be a GIF, JPEG, or PNG image file no greater than ' . (MM_MAXFILESIZE / 1024) .
                                    ' KB and ' . MM_width . 'x' . MM_height . ' pixels in size.</p>';
                              }
                }
                
                
                if (!$error) {
                    
                    if ( !empty($firstname) && !empty($lastname) && !empty($gender) &&
                            !empty($birthday) &&  !empty($city) && !empty($state)){
                        
                    if (!empty($newpic)) {
                        $updatedata = "UPDATE mismatch_user SET first_name='$firstname', last_name='$lastname', gender='$gender', birthdate='$birthday', city='$city', state='$state', picture='$newpic' WHERE user_id='".$_SESSION['user_id']."'";
                    }
                    
                    else {
                        $updatedata = "UPDATE mismatch_user SET first_name='$firstname', last_name='$lastname', gender='$gender', birthdate='$birthday', city='$city', state='$state' WHERE user_id='".$_SESSION['user_id']."'";
                    }
                        $querydata = mysqli_query($dbc, $updatedata) or die(mysqli_error());
                        echo '<p>Your profile has been successfully updated. Would you like to <a href="viewprofile.php">view your profile</a>?</p>';
                        mysqli_close($dbc);
                        exit();
                    }
                    else {
                        echo '<p>You must enter all of the profile data (the picture is optional).</p>';
                    }
                }
             } 
             else {
                $query = "SELECT first_name, last_name, gender, birthdate, city, state, picture FROM mismatch_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
                $data = mysqli_query($dbc, $query);
                $row = mysqli_fetch_array($data);
                if ($row != NULL){
                   $firstname = $row['first_name'];
                   $lastname = $row['last_name'];
                   $gender = $row['gender'];
                   $birthday = $row['birthdate'];
                   $city = $row['city'];
                   $state = $row['state'];
                   $oldpic = $row['picture'];
                }
                else {
                   echo 'There was a problem in retrieving all your data'; 
                }
             }
                mysqli_close($dbc);
                
            ?>
        <form enctype="multipart/form-data" method="post" action=<?php $_SERVER['PHP_SELF'];?>>
        
        <input type="hidden" name="Max_File_Size" value=<?php echo GW_MAX_FILE_SIZE; ?>/>
          
                <legend>Personal Information</legend>
                    
                    <div class="form-group">
                        <label for="firtsname">First Name:</label>
                        <input type="text" class="form-control" name="firstname" value=<?php if (!empty($firstname)) echo $firstname; ?>>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" class="form-control" name="lastname" value=<?php if (!empty($lastname)) echo $lastname; ?>>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input type="text" class="form-control" name="birthday" value=<?php if (!empty($birthday)) echo $birthday; ?>>
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" name="city" value=<?php if (!empty($city)) echo $city; ?>>
                    </div>
                    <div class="form-group">
                        <label for="state">State:</label>
                        <input type="text" class="form-control" name="state" value=<?php if (!empty($state)) echo $state; ?>>
                    </div>
                    <select id="gender" name="gender">
                    <option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>Male</option>
                    <option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>Female</option>
                    </select><br />
                    <div class="form-group">
                    <label for="newpic">File input</label>
                    <input type="file" id="newpic" name="newpic">
                    </div>
                    <input type="submit" name="update" class="btn btn-default" value="Submit">
                   
        </form>
    <?php
            require_once 'appvars.php';
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA) or die(mysqli_error());
            $queryresponse = 'SELECT response_id, topic_id, response FROM mismatch_response WHERE user_id='.$_SESSION['user_id'].'';
            $dataresponse = mysqli_query($dbc, $queryresponse) or die ('Did not select all the data');
            $responsearray = array();   
                if (mysqli_num_rows($dataresponse) == 0){
                    $query = 'SELECT topic_id FROM mismatch_topic ORDER BY category_id, topic_id';
                    $data = mysqli_query($dbc, $query) or die('Did not select topics');
                }
                
                while ($row = mysqli_fetch_array($data)){
                    array_push($responsearray, $row['topic_id']);
                }
                
                foreach ($responsearray as $topics) {
                    $insert='INSERT INTO mismatch_response (user_id,topic_id) VALUES('.$_SESSION['user_id'].','.$topics.')';
                    $data= mysqli_query($dbc, $insert) or die('Did not isert Zeros');
                }  
                
            if(isset($_POST['submit'])) {
                    foreach ($_POST as $response_id => $response) {
                        $query = "UPDATE mismatch_response SET response = '$response' WHERE response_id='$response_id'";
                        $data = mysqli_query($dbc, $query);
                    }
                    $massage = "Changes has been saved on our system";
                }
                    
            
            $query = 'SELECT response_id, topic_id, response FROM mismatch_response WHERE user_id="'.$_SESSION['user_id'].'"'; 
            $data = mysqli_query($dbc, $query) or die('Did not select all the data');
            $responsedata = array();
            
                while($row = mysqli_fetch_array($data)){
                            $query2 = 'SELECT name, category_id FROM mismatch_topic WHERE topic_id="'.$row['topic_id'].'"';
                            $data2 = mysqli_query($dbc, $query2) or die ('Didnt Select the topics');
                        if (mysqli_num_rows($data2)==1){
                            $row2 = mysqli_fetch_array($data2);
                            $row['topic_name']  =   $row2['name'];  
                            $query3 ='SELECT name FROM mismatch_category WHERE category_id='.$row2['category_id'].'';
                            $data3 = mysqli_query($dbc, $query3) or die ('Didnt Select the categories');
                        if (mysqli_num_rows($data3)==1) {
                            $row3 = mysqli_fetch_array($data3);
                            $row['category_name'] = $row3['name'];
                            array_push($responsedata, $row);
                        }
                    }
                }
                
                 mysqli_close($dbc);
                
                    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
                            $category = $responsedata[0]['category_name'];
                            echo '<fieldset><legend>' . $responsedata[0]['category_name'] . '</legend>';
                            foreach ($responsedata as $response) {
                                if ($category != $response['category_name']){
                                    $category = $response['category_name'];
                                    echo '</fieldset><fieldset><legend>' . $response['category_name'] . '</legend>';
                                }
                                echo '<label  for="' . $response['response_id'] . '">' . $response['topic_name'] . ':</label>';
                                    echo '<input type="radio" id="' . $response['response_id'] . '" name="' . $response['response_id'] . '" value="0" ' . ($response['response'] == 0 ? 'checked="checked"' : '') . ' />Unknown ';
                                    echo '<input type="radio" id="' . $response['response_id'] . '" name="' . $response['response_id'] . '" value="1" ' . ($response['response'] == 1 ? 'checked="checked"' : '') . ' />Love ';
                                    echo '<input type="radio" id="' . $response['response_id'] . '" name="' . $response['response_id'] . '" value="2" ' . ($response['response'] == 2 ? 'checked="checked"' : '') . ' />Hate<br />';
    
                         }
                                echo '</fieldset>';
                                echo '<input type="submit" value="Submit" name="submit" /><br  />';
                                echo $massage;
                                echo '</form>';
                    require_once '../Footer.php';
    ?>
