<?php
// Initialize the session
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    // Unset all of the session variables
    $_SESSION = array();
        
    // Destroy the session.不一定要
    session_destroy();
        

}
// else{
//     // Redirect to login page
//     header("location: login.php");
//     exit;
// }

// Redirect to login page
header("location: index.php");
exit;

?>