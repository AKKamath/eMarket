<?php
    require("../controllers/includes/helpers.php");
    require("../controllers/c_store.php");
    if(empty($_GET["category"]))
        $_GET["category"] = 0;
    if(empty($_GET["college"]))
        $_GET["college"] = 0;
    $items = get_items(array($_GET["category"], $_GET["college"]));
    render("v_store.php", array("title" => "Store", "data" => $items));
?>