<?php 
    session_start();
    require("../includes/helpers.php");
    if (empty($_SESSION["id"]))
        render("intro.html", array("title" => "Project 2"));
    else
        render("welcome.html", array("title" => "Dashboard"));
?>