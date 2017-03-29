<?php
            require_once '../session_start.php';

            $page_title = 'View Profile';
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

                if (!isset($_GET['user_id'])) {
            $query = "SELECT username, first_name, last_name, gender, birthdate, city, state, picture FROM mismatch_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
                }
                else {
            $query = "SELECT username, first_name, last_name, gender, birthdate, city, state, picture FROM mismatch_user WHERE user_id = '" . $_GET['user_id'] . "'";
                }
            $data = mysqli_query($dbc, $query) or die(mysqli_error());

                if (mysqli_num_rows($data)==1) {
                    $row = mysqli_fetch_array($data);
                    echo '<table>';

                if (!empty($row['username'])) {
                    echo '<tr><td>Username:</td><td>' . $row['username'] . '</td></tr>';
                }       
                if (!empty($row['first_name'])) {
                    echo '<tr><td>First name:</td><td>' . $row['first_name'] . '</td></tr>';
                }
                if (!empty($row['last_name'])) {
                    echo '<tr><td>Last Name:</td><td>' . $row['last_name'] . '</td></tr>';
                }
                if (!empty($row['gender'])) {
                    echo '<tr><td>Gender:</td><td>';
                if ($row['gender'] == 'M') {
                    echo 'Male';
                }
                else if ($row['gender'] == 'F') {
                    echo 'Female';
                }
                else {
                    echo '?';
                }
                    echo '</td></tr>';
                }
                if (!empty($row['birthdate'])) {
                    if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
                    echo '<tr><td>Birthdate:</td><td>' . $row['birthdate'] . '</td></tr>';
                }
                else {
                    list($year, $month, $day) = explode('-', $row['birthdate']);
                    echo '<tr><td class="label">Year born:</td><td>' . $year . '</td></tr>';
                }
            }
                if (!empty($row['city']) || !empty($row['state'])) {
                    echo '<tr><td>Location:</td><td>' . $row['city'] . ', ' . $row['state'] . '</td></tr>';
                }
                if (!empty($row['picture'])) {
                    echo '<tr><td>Picture:</td><td><img src="' . GW_UPLOADPATH2. $row['picture'] .
                    '" alt="Profile Picture" /></td></tr>';
                }
                else {
                    echo '<tr><td>Picture:</td><td><img src="' . GW_UPLOADPATH2. 'nopic.jpg'.
                    '" alt="Profile Picture" /></td></tr>';
                }
                    echo '</table>';
                if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
                    echo '<p>Would you like to <a href="editprofile.php">edit your profile</a>?</p>';
                }
            } 
      else {
        echo '<p>There was a problem accessing your profile.</p>';
      }
      require_once '../Footer.php';
?>
