<?php
    // Enable sessions
    session_start();
    
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);
            // render view (between header and footer)
            require("../views/header.php");
            if(!empty($values["msg"]))
                echo "<script>alert(\"" . $values["msg"] ."\");</script>";
            require("../views/{$view}");
            require("../views/footer.html");
            exit;
        }
        // else error
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
?>