<?php
    require("../controllers/includes/helpers.php");
    require("../models/m_index.php");
    if (empty($_SESSION["id"]))
        render("v_intro.html", array("title" => "Project 2"));
    else
    {
        // They're trying to delete a sale
        if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["delete"]))
        {
            unlink("images/" . del_sale($_POST["delete"]));
        }
        $details = fetch_sales($_SESSION["id"]);
        render("v_welcome.php", array("title" => "Dashboard", "data" => $details));
    }
?>