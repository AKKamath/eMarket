<?php
    require("../controllers/includes/helpers.php");
    require("../models/m_login.php");
    
    // Normal page load
    if($_SESSION["REQUEST_METHOD"] == "GET")
        render("v_login.html", array("title" => "Login"));
        
    // Submit info
    else if($_SESSION["REQUEST_METHOD"] == "POST")
    {
        // Check for valid inputs
        if(empty($_POST["email"]) || empty($_POST["password"]))
        {
            render("v_login.html", array("title" => "Login", "msg" => "Email and Password required."));
            exit;
        }
        
        // Check proper format for email
        if(!preg_match("/\S+@\S+\.\S+/", $_POST["email"]))
        {
            render("v_login.html", array("title" => "Login", "msg" => "Invalid Email."));
            exit;
        }
        
        // Request DB info
        $details = check($_POST);
        
        // User not found
        if(empty($details))
        {
            render("v_login.html", array("title" => "Login", "msg" => "User not found."));
            exit;
        }
        
        // Password does not match
        if($details == -1)
        {
            render("v_login.html", array("title" => "Login", "msg" => "Invalid password."));
            exit;
        }
        
        // Everything looks good, let's get this show on the road
        else
        {
            $_SESSION["id"]    = $details["id"];
            $_SESSION["name"]  = $details["name"];
            $_SESSION["sex"]   = $details["sex"];
            $_SESSION["email"] = $details["email"];
            header("Location: /index.php");
            exit;
        }
    }
?>