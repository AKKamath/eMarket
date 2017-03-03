<?php 
    session_start();
    require("../includes/helpers.php");
    if (empty($_SESSION["id"]))
        render("../views/intro.html");
    else
        render("../views/welcome.html");
?>