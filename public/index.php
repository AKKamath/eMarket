<?php 
    session_start();
    require("../controllers/includes/helpers.php");
    if (empty($_SESSION["id"]))
        render("intro.php", array("title" => "Project 2"));
    else
        render("welcome.html", array("title" => "Dashboard"));
?>