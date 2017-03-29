<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <?php echo '<title>'.$page_title.'</title>';?>
        <link rel="stylesheet" type=text/css href="/css/main.css">
        <script type="text/javascript" src="/javascript/main.js"></script>     
    </head>
    <body onload="currentTime();">
        <ul>
            <li><a href="\index.php">Home</a></li>
                <li class="dropdown">
                <a href="#" class="dropbtn">GuitarWars</a>            
            <div class="dropdown-content">                       
                        <a href="/guitarwars/Guitarwars_table.php">Guitarwars Scores</a>
                        <a href="/guitarwars/guitar_high_scores.php">Register High Score</a>  
                        <a href="/guitarwars/removehighscore.php">Remove Unwanted Scores</a>
                        <a href="/guitarwars/approvescore.php">Admin Page</a>
            </div>
                </li>
                <li class="dropdown">   
                <a href="#" class="dropbtn">Subcription</a>
            <div class="dropdown-content">
                       
                        <a href="/mails/Subscribe.php">Subcribe</a>
                        <a href="/mails/neilsendmailphp.php">Send Mail</a>
                        <a href="/mails/cancellSubcription.php">Cancell Subcribtion</a>
                        <a href="/mails/deleteEmails.php">Delete Emails</a>
            </div>
            
            </li>
            <li class="dropdown">   
                <a href="#" class="dropbtn">Mismatch Application</a>
            <div class="dropdown-content">
                       
                        <a href="../userlogin.php">Log In</a>
                        <a href="/MisMatchApp/signup_page.php">Sign Up</a>
                        <a href="../logout.php">Log Out</a>
                        <a href="/MisMatchApp/viewprofile.php">View Profile</a>
                        <a href="/MisMatchApp/editprofile.php">Edit Profile</a>
                        <a href="/MisMatchApp/users.php">View Users</a>
                        <a href="/MisMatchApp/questionare.php">Questionare</a>
                        <a href="/MisMatchApp/Mismatch.php">MisMatch Application</a>
                        
                        
            </div>
            
            </li>
            
            <li class="dropdown">   
                <a href="#" class="dropbtn">Risky Jobs</a>
            <div class="dropdown-content">
                       
                        <a href="/riskyJobs/riskyJobsApp.php">Risky Jobs App</a>
                        <a href="/riskyJobs/registration.php">Registration Form</a>
            </div>
            
            </li>
            
        </ul>
        
