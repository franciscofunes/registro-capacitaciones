<?php 
//with this we identify the session that needs to be destroy
include_once 'includes/session.php'?>

<?php
//session_destroy()  destroys the session then the header() function redirects to the home page
    session_destroy();
    header('Location: index.php');
?>