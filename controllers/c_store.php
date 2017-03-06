<?php
    require("../models/mysql.php");
    function get_items($parameters = array(0, 0))
    {
        $connection = connect("../models/config.json");
        if($paramters[0] == 0 && $parameters[1] == 0)
            $raw = mysqli_query($connection, "SELECT (Image, Name, Price, College, Category, Selldate, Seller) FROM Sales;");
        else if($parameters[1] != 0 && $parameters[0] == 0)
            $raw = mysqli_query($connection, "SELECT (Image, Name, Price, College, Category, Selldate, Seller) FROM Sales WHERE College =" . $parameters[1] . ";");
        else if($parameters[0] != 0 && $parameters[1] == 0)
            $raw = mysqli_query($connection, "SELECT (Image, Name, Price, College, Category, Selldate, Seller) FROM Sales WHERE Category =" . $parameters[0] . ";");
        else
            $raw = mysqli_query($connection, "SELECT (Image, Name, Price, College, Category, Selldate, Seller) FROM Sales " .
                "WHERE Category = " . $parameters[0] . " AND College = ". $parameters[1] . ";");
        echo print_r($data);
    }
?>
