<?php
    require("../controllers/includes/helpers.php");
    require("../models/m_register.php");
    // User has opened the page
    if($_SERVER["REQUEST_METHOD"] == "GET")
        render("v_register.html", array("title" => "Register"));
        
    // User has submitted form
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Check for proper inputs
        if(empty($_POST["email"]) || empty($_POST["name"]) || empty($_POST["cid"]) || empty($_POST["pwd"]) || !isset($_POST["sex"]) || empty($_POST["rpwd"]))
        {
            render("v_register.html", array("title" => "Register", "msg" => "All fields are required."));
            exit;
        }
        
        // Password should be entered the same twice
        if($_POST["pwd"] != $_POST["rpwd"])
        {
            render("v_register.html", array("title" => "Register", "msg" => "Password does not match confirmation."));
            exit;
        }
        
        // Password should be between 6 and 30 characters
        if(strlen($_POST["pwd"]) > 30 || strlen($_POST["pwd"]) < 6)
        {
            render("v_register.html", array("title" => "Register", "msg" => "Password should be between 6 and 30 characters."));
            exit;
        }
        
        // Email should be of form A@B.C
        if(!preg_match("/\S+@\S+\.\S+/", $_POST["email"]))
        {
            render("v_register.html", array("title" => "Register", "msg" => "Invalid Email."));
            exit;
        }
        
        $data = array(
                "Email" => $_POST["email"],
                "Name" => $_POST["name"],
                "Password" => $_POST["pwd"],
                "Gender" => $_POST["sex"], 
                "CollegeId" => $_POST["cid"]
            );
        $id = create_user($data);
        
        // User already exists
        if(!empty($id) && $id == -1)
        {
            render("v_register.html", array("title" => "Register", "msg" => "User already exists"));
            exit;
        }
        else
        {
            $_SESSION["id"]    = $id;
            $_SESSION["name"]  = $_POST["name"];
            $_SESSION["sex"]   = $_POST["sex"];
            $_SESSION["email"] = $_POST["email"];
            header("Location: /index.php");
            exit;
        }
    }
?>