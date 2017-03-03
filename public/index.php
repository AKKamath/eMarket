<?php 
    session_start();
    require("../includes/helpers.php");
    if (empty($_SESSION["id"]))
        render("../views/intro.html", array("title" => "Project 2"));
    else
        render("../views/welcome.html", array("title" => "Dashboard"));
?>