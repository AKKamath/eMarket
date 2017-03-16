<?php
    require("../controllers/includes/helpers.php");
    require("../models/m_store.php");
    if(empty($_GET["category"]))
        $_GET["category"] = 0;
    if(empty($_GET["college"]))
        $_GET["college"] = 0;
    if(empty($_GET["id"]))
        $_GET["id"] = 0;
    $items = get_items(array($_GET["category"], $_GET["college"], $_GET["id"]));
    render("v_store.php", array("title" => "Store", "data" => $items));
?>