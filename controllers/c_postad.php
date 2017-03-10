<?php
    require("../controllers/includes/helpers.php");
    require("../models/m_postad.php");
    
    // User has not logged in
    if(empty($_SESSION["id"]))
    {
        header("location: /login.php");
        exit;
    }
    
    // User wishes for form
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("v_postad.html", array("title" => "Post Ad"));
        exit;
    }
    // User has submitted form
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Check for all valid inputs
        if(empty($_POST["category"]) || empty($_POST["title"]) || empty($_POST["desc"]) || empty($_POST["contact"]) ||
            (empty($_POST["choice"]) && empty($_POST["price"])))
        {
            echo empty($_POST["category"]);
            echo empty($_POST["title"]);
            echo empty($_POST["desc"]);
            echo empty($_POST["contact"]);
            echo (empty($_POST["choice"]) && empty($_POST["price"]));
            render("v_postad.html", array("title" => "Post Ad", "msg" => "All fields are required."));
            
            exit;
        }
        if(strlen($_POST["title"]) < 4)
        {
            render("v_postad.html", array("title" => "Post Ad", "msg" => "Title must be at least 4 characters in length."));
            exit;
        }
        if(strlen($_POST["desc"]) > 200)
        {
            render("v_postad.html", array("title" => "Post Ad", "msg" => "Description cannot exceed 200 characters."));
            exit;
        }
        if(strlen($_POST["contact"]) < 4)
        {
            render("v_postad.html", array("title" => "Post Ad", "msg" => "Contact Info must be at least 4 characters in length."));
            exit;
        }
        
        // All inputs are valid, validate image now
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check == false) 
        {
            render("v_postad.html", array("title" => "Post Ad", "msg" => "File is not an image."));
            exit;
        }
        if (file_exists($target_file)) 
        {
            render("v_postad.html", array("title" => "Post Ad", "msg" => "Rename the file."));
            exit;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) 
        {
            render("v_postad.html", array("title" => "Post Ad", "msg" => "Only JPG, JPEG, PNG, and GIF files are allowed."));
            exit;
        }
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
        {
            $data = array(
                "Image" => basename($_FILES["image"]["name"]),
                "Name" => $_POST["title"],
                "Description" => $_POST["desc"],
                "ContactInfo" => $_POST["contact"],
                "Price" => !empty($_POST["choice"]) ? -1 : $_POST["price"],
                "College" => $_SESSION["college"],
                "Category" => $_POST["category"],
                "SellerId" => $_SESSION["id"]
                );
            create_sale($data);
            header("location: /");
        }
        else 
        {
            render("v_postad.html", array("title" => "Post Ad", "msg" => "Error uploading file."));
            exit;
        }
    }
?>