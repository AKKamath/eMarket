<?php
    require("../controllers/includes/helpers.php");
    require("../models/m_item.php");
    if(empty($_GET["id"]))
        $data = 0;
    else
        $data = fetch($_GET["id"]);
    render("v_item.php", array("title" => "Dashboard", "data" => $data))
?>