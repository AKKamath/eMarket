<?php
    require("../controllers/includes/helpers.php");
    
    // unset any session variables
    $_SESSION = null;
    // expire cookie
    if (!empty($_COOKIE[session_name()]))
    {
        setcookie(session_name(), "", time() - 42000);
    }
    // destroy session
    session_destroy();
    
    header("location: /");
?>