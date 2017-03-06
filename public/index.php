<?php 
    session_start();
    require("../controllers/includes/helpers.php");
    if (empty($_SESSION["id"]))
        render("v_intro.html", array("title" => "Project 2"));
    else
        render("v_welcome.php", array("title" => "Dashboard"));
?>